<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class CommentController extends Controller
{
		public function comment()
	{
		$comment = Comment::all();
		return view('thread.comment', ['comments' => $comments]);
	}
	
	public function show()
	{
		$comment = Comment::find($id);
		
		$comment = Comment::findOrFail($id);
		$good = $comment->$good()->where('user_id', Auth::user()->id)->first();
		
		return view('thread.response')->with(array('comment' => $comment, 'good' => $good));
	}
	
	public function store(Request $request)
	{
		$rules = [
			'comment_text' => 'required',
			];
		
		$messages = array(
			'comment_text.required' => '本文を正しく入力して下さい',
			);
		
		$comment->user_id = $request->user()->id;
		
		$validator = $Varidator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$comment = new Comment;
			$comment->comment_text = Input::get('comment_text');
			$comment->thread_id = Input::get('thread_id');
			$comment->response_count = 0;
			$comment->save();
			return redirect()->back()->with('message', '投稿が完了しました');
		} else {
			return redirect()->back()->withErrors($validator)->withInput();
		}
	}
}