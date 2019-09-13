<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Thread;
use App\Comment;
use App\Response;
use App\Category;
use App\Follow;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        $user_id = Auth::id();
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
