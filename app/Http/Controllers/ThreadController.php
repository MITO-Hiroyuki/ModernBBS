<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;
use App\Category;

class ThreadController extends Controller
{
	public function index()
	{
		$threads = Thread::all();
		return view('thread.index')->with('threads', $threads);
	}
	
	public function show($id)
	{
		$thread = Thread::find($id);
		return view('thread.comment')->with('thread', $thread);
	}
	
	public function showThread($category_id)
	{
		$comment = Comment::find($category_id);
		return view('thread.index')->with('category', $category);
	}
	
	public function create()
	{
		return view('thread.post');
	}
	
	public function store()
	{
		$rules = [
			'thread_title' => 'required',
			'body' => 'required',
			'category_id' => 'required',
			];
		
		$messages = array(
			'thread_title.required' => 'タイトルを正しく入力して下さい',
			'body.required' => '本文を正しく入力して下さい',
			'category_id.required' => 'カテゴリーを選択して下さい',
			);
		
		//$thread->user_id = $request->user()->id;
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$thread = new Thread;
			$thread->user_id = Input::get('user_id');
			$thread->thread_title = Input::get('thread_title');
			$thread->body = Input::get('body');
			$thread->category_id = Input::get('category_id');
			$thread->comment_count = 0;
			$thread->save();
			return redirect()->back()->with('message', '投稿が完了しました');
		} else {
			return redirect()->back()->withErrors($validator)->withInput();
		}
	}

}
