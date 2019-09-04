<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;
use App\Category;

class ThreadController extends Controller
{
	public function index($category_id)
	{
		$category_threads = Thread::where('category_id', $category_id)->get();
		$user = $category_id->thread->user();
		$category_threads = $user->load('category_threads');
		return view('thread.index', ['category_threads' => $category_threads]);
	}
	
	public function show($id)
	{
		$thread = Thread::find($id);
		return view('thread.comment')->with('thread', $thread);
	}
	
	public function showThread($category_id)
	{
		$category_threads = Thread::where('category_id', $category_id)->get();
		return view('thread.index', ['category_threads' => $category_threads]);
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
		$form = $request->all();
		
		unset($form['_token']);
		unset($form['image']);
		
		$thread->fill($form);
		$thread->save();
		
		return view('thread.post');
	}
	
	/*
	public function store(Request $request)
	{
		//dd($request->all());
		
		$validator = Validator::make($request->all(), [
			'thread_title' => 'required',
			'body' => 'required',
			'category_id' => 'required',
		]);
		if ($validator->fails()) {
			return redirect('thread/create')
						->withErrors($validator)
						->withInput();
		} else {
			return redirect()
						->back()
						->with('message', '投稿が完了しました');
		}
	}
	*/
}
