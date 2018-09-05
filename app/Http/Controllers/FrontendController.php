<?php

namespace App\Http\Controllers;

use App\Blog;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $publishedBlogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.publication_status', 1)
            ->get();

        return view('FrontEnd.Home.home' , ['publishedBlogs' => $publishedBlogs]);
    }
    public function about(){
        return view('FrontEnd.About.about');
    }
    public function services(){
        return view('FrontEnd.Services.services');
    }
    public function contact(){
        return view('FrontEnd.Contact.contact');
    }
}
