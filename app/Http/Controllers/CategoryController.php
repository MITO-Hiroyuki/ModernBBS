<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\Profile;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        $threads = Thread::orderBy('created_at','desc')->paginate(10);
        return view('category.index', ['categories' => $categories,
                                        'threads'=> $threads,
                                        compact('threads')]);
        
    }
}
