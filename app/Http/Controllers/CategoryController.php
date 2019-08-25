<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;

class CategoryController extends Controller
{
    public function index(){
        $categoties = Category::all();
        $new_threads = Thread::orderBy('created_at','desc')->get();
        return view('category.index',['categories' => $categoties, 'new_threads'=> $new_threads]);
    }
}
