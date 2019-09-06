<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class CommentController extends Controller
{
	public function show()
	{
		$comments = Comment::all();
		return view('thread.comment')->with('comments', $comments);
	}
	
	public function showResponse($id)
	{
		$comment = Comment::find($id);
		return view('thread.response')->with('comment', $comment);
	}
	
	public function good()
	{
		$good = $comment->$good()->where('user_id', Auth::user()->id)->first();
		
		return view('thread.response')->with(array('comment' => $comment, 'good' => $good));
	}
	
	public function store()
	{
		$validator = Validator::make($request->all(), [
			'comment_text' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('comment/show')
						->withErrors($validator)
						->withInput();
		} else {
			return redirect()
						->back()
						->with('message', '投稿が完了しました');
		}
		
		/*
		$rules = [
			'comment_text' => 'required',
			];
		
		$messages = array(
			'comment_text.required' => '本文を正しく入力して下さい',
			);
		
		//$comment->user_id = $request->user()->id;
		
		$validator = $Varidator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$comment = new Comment;
			$comment->user_id = input::get('user_id');
			$comment->comment_text = Input::get('comment_text');
			$comment->thread_id = Input::get('thread_id');
			$comment->response_count = 0;
			$comment->save();
			return redirect()->back()->with('message', '投稿が完了しました');
		} else {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		*/
	}
}