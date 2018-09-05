<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('Admin.category.add-category');
    }
    protected function categoryFieldValidate(Request $request){
        $this->validate($request, [
            'category_name' => 'required',
            'category_description' => 'required'
        ]);
    }
    public function saveCategoryInfo(Request $request){
        $this->categoryFieldValidate($request);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/category/add')->with('message', 'Category Information Save Successfull');
    }
    public function manageCategoryInfo(){
        $categories = Category::all();
        return view('Admin.category.category-manage', [ 'categories' => $categories ]);
    }
    public function editCategoryInfo($id){
        $categoryById = Category::find($id);
        return view('Admin.category.edit-category', ['categoryById' => $categoryById ]);
    }
    public function updateCategoryInfo(Request $request){
        $this->categoryFieldValidate($request);
        $categoryById = Category::find($request->category_id);
        $categoryById->category_name = $request->category_name;
        $categoryById->category_description = $request->category_description;
        $categoryById->publication_status = $request->publication_status;
        $categoryById->save();
        return redirect('/category/manage')->with('message', 'Category Information Update Successfull');
    }
    public function deleteCategoryInfo($id){
        $categoryById = Category::find($id);
        $categoryById->delete();
        return redirect('/category/manage')->with('message', 'Category Information Delete Successfull');
    }
}
