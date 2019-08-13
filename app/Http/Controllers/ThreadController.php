<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
	public function add()
	{
		return view('thread.create');
	}
	
	public function create(Request $request_thread)
	{
		$this->validate($request_thread, Thread::$rules);
		
		$thread = new Thread;
		
		$thread->thread_profile_id = $request_thread->profile()->id;
		$thread->category_id = $request_thread->category()->id;
		
		$thread_form = $request_thread->all();
		
		unset($form['_token']);
		
		$thread->fill($thread_form);
		$thread->save();
		
		return redirect('thread');
	}
	
	public function delete(Request $request_thread)
	{
		$thread = thread::find($request_thread->id);
		$thread->delete();
		return redirect('thread');
	}
}
