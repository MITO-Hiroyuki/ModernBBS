<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;
use App\Category;
use App\Follow;

class ThreadController extends Controller
{
	public function index($category_id)
	{
		return view('thread.post');
	}
	
	public function show($thread_id)
	{
		/*
		$threads = thread::where('thread_id', $thread_id)->get();
		$user = $thread_id->thread->user();
		$comments = $user->load('comments');
		return view('thread.comment', ['comments' => $comments]);
		*/
		$thread = Thread::findOrFail($thread_id);
		return view('thread.comment', ['thread' => $thread]);
	}
	
	public function showThread($category_id)
	{
		$category_threads = Thread::where('category_id', $category_id)->get();
		$user_id = Auth::id();

		return view('thread.index', ['category_threads' => $category_threads,
									'user_id' => $user_id]);
	}
	
	public function add()
	{
		return view('thread.post');
	}
	
	public function create(Request $request)
	{
		$this->validate($request, Thread::$rules);
		
		$thread = new Thread;
		$thread->user_id = Auth::user()->id;
		$thread->profile_id = Auth::user()->id;
		$form = $request->all();
		
		unset($form['_token']);
		unset($form['image']);
		
		$thread->fill($form);
		$thread->save();
		
		return view('thread.post');
	}
}
