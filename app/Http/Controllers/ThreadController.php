<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
	public function add()
	{
		return view('thread.create');
	}
	
	public function index()
	{
		$threads = Thread::all();
		return view::make('thread.index')->with('threads', $threads);
	}
	
	public function show()
	{
		$thread = Thread::find($id);
		return view::make('thread.detail')->with('thread, $thread');
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
		
		$validator = $Varidator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$thread = new Thread;
			$thread->thread_title = Input::get('thread_title');
			$thread->body = Input::get('body');
			$thread->category_id = Input::get('category_id');
			$thread->save();
			return Redirect::back()->with('message', '投稿が完了しました');
		} else {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}
	}
	
	public function delete(Request $request_thread)
	{
		$thread = thread::find($request_thread->id);
		$thread->delete();
		return redirect('thread');
	}
}
