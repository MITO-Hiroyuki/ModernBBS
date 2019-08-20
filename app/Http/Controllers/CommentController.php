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
		return view('thread.response', ['comment' => $comment]);
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
			$comment->save();
			return Redirect::back()->with('message', '投稿が完了しました');
		} else {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}
	}
}