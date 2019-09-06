<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\Profile;
use App\User;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        list($category1, $category2, $category3, $category4, $category5, $category6) = $categories;
        $threads = Thread::orderBy('created_at','desc')->simplePaginate(5);
        return view('category.index', ['category1' => $category1,
                                        'category2' => $category2,
                                        'category3' => $category3,
                                        'category4' => $category4,
                                        'category5' => $category5,
                                        'category6' => $category6,
                                        'threads'=> $threads,
                                        compact('threads')]);
        
    }
    
    
}
