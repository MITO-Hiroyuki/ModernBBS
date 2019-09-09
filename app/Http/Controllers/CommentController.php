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
		$responses = Response::where('comment_id', $comment_id)->get();
		return view('thread.response', ['responses' => $responses]);
	}
	
	public function good()
	{
		$good = $comment->$good()->where('user_id', Auth::user()->id)->first();
		
		return view('thread.response')->with(array('comment' => $comment, 'good' => $good));
	}
	
	public function add()
	{
		return redirect()->back();
	}
	
	public function create()
	{
		$this->validate($request, Comment::$rules);
		
		$comment = new Comment;
		$comment->user_id = Auth::user()->id;
		$form = $request->all();
		
		unset($form['_token']);
		unset($form['image']);
		
		$comment->fill($form);
		$comment->save();
		
		return redirect()->back()->with('message', '投稿が完了しました');
	}
}