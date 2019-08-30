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
		$comments = Comment::orderBy('created_at', 'desc')->paginate(10);
		return view('thread.comment', ['comments' => $comments]);
	}
	
	public function show($comment_id)
	{
		$comment = Comment::findOrFail($comment_id);
		return view ('comment.comment', [
			'thread' => $thread,
			]);
	}
	
	public function good()
	{
		$good = $comment->$good()->where('user_id', Auth::user()->id)->first();
		
		return view('thread.response')->with(array('comment' => $comment, 'good' => $good));
	}
	
	public function store(Request $request)
	{
		$params = $request->validate([
			'thread_id' => 'required|exists:threads,id',
			'comment_text' => 'required'
			]);
		
		$thread = Thread::findOrFail('$params');
		$thread->comments()->create($params);
		
		return redirect()->route('thread.comment', ['thread' => $thread])->with('messsage', 'コメントを送信しました');
	}
}