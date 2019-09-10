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

class CommentController extends Controller
{
	public function show()
	{
		$comment = comment::findOrFail($comment_id);
		return view('thread.response', ['comment' => $comment]);
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
	
	public function create(Request $request)
	{
		$this->validate($request, Comment::$rules);
		
		$comment = new Comment;
		$comment->user_id = Auth::user()->id;
		$comment->thread_id = $comment->id;
		//$comment->thread_id = Thread()->id;
		$comment->profile_id = Auth::user()->id;
		$form = $request->all();
		
		unset($form['_token']);
		unset($form['image']);
		
		$comment->fill($form);
		$comment->save();
		
		return redirect()->back()->with('message', '投稿が完了しました');
	}
}