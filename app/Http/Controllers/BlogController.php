<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $publishedcategories = Category::where('publication_status', 1)->get();
        return view('Admin.blog.add-blog' , [ 'publishedcategories' => $publishedcategories ]);
    }
    protected function blogFieldValidate(Request $request){
        $this->validate($request, [
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required'
        ]);
    }
    public function uploadBlogImage($request){
        $blogImage = $request->file('blog_image');
        $imageName = $blogImage->getClientOriginalName();
        $directory = 'blog-images/';
        $blogImage->move($directory , $imageName);
        $imageUrl = $directory.$imageName;
        return $imageUrl;
    }
    public function saveBasicBlogInfo($request , $imageUrl){
        $blog = new Blog();
        $blog->blog_title = $request->blog_title;
        $blog->category_id = $request->category_id;
        $blog->blog_description = $request->blog_description;
        $blog->blog_image = $imageUrl;
        $blog->publication_status = $request->publication_status;
        $blog->save();
    }
    public function saveBlogInfo(Request $request){
        $this->blogFieldValidate($request);
        $imageUrl = $this->uploadBlogImage($request);
        $this->saveBasicBlogInfo($request, $imageUrl);
        return redirect('/blog/add')->with('message' , 'Blog Information Save Successfull');
    }
    public function manageBlogInfo(){
        $blogdetails = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->get();

        return view('Admin.blog.manage-blog' , [ 'blogdetails' => $blogdetails]);
    }
    public function viewBlogInfo($id){
        $blogById = DB::table('blogs')
                    ->join('categories', 'blogs.category_id', '=', 'categories.id')
                    ->select('blogs.*', 'categories.category_name')
                    ->where('blogs.id', $id)
                    ->first();
        return view('Admin.blog.view-blog', ['blogById' => $blogById]);
    }
    public function unpublishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 0;
        $blogById->save();
        return redirect('/blog/manage')->with('message', 'Blog Information Unpublished Successfull');
    }
    public function publishedBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->publication_status = 1;
        $blogById->save();
        return redirect('/blog/manage')->with('message', 'Blog Information Published Successfull');
    }
    public function editBlogInfo($id){
        $blogById = Blog::find($id);
        $publishedcategories = Category::where('publication_status', 1)->get();
        return view('Admin.blog.edit-blog', [
            'blogById' => $blogById,
            'publishedcategories' => $publishedcategories
        ]);
    }
    protected function updateBlogBasicInfo($blogById, $request, $imageUrl=null){
        $blogById->blog_title = $request->blog_title;
        $blogById->category_id = $request->category_id;
        $blogById->blog_description = $request->blog_description;
        if($imageUrl){
            $blogById->blog_image = $imageUrl;
        }
        $blogById->publication_status = $request->publication_status;
        $blogById->save();
    }
    public function updateBlogInfo(Request $request){
        $blogImage = $request->file('blog_image');
        $blogById = Blog::find($request->blog_id);
        if($blogImage){
            unlink($blogById->blog_image);
            $imageUrl = $this->uploadBlogImage($request);
            $this->updateBlogBasicInfo($blogById, $request, $imageUrl);
        }else{
            $this->updateBlogBasicInfo($blogById, $request);
        }
        return redirect('/blog/manage')->with('message', 'Blog Information Update Successful');
    }
    public function deleteBlogInfo($id){
        $blogById = Blog::find($id);
        $blogById->delete();
        return redirect('/blog/manage')->with('message', 'Blog Information Delete Successful');
    }
}
