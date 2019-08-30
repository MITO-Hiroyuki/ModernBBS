<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class ResponseController extends Controller
{
	public function Response()
	{
		$responses = Response::orderBy('created_at', 'desc')->paginate(10);
		return view('thread.comment.response', ['responses' => $responses]);
	}
	
	public function store(Request $request)
	{
		$params = $request->validate([
			'comment_id' => 'required|exists:comments,id',
			'response_text' => 'required'
			]);
		
		$comment = Comment::findOrFail('$params');
		$comment->response()->create($params);
		
		return redirect()->route('thread.comment.response', ['comment' => $comment])->with('message', 'レスポンスを送信しました');
		
	}
}
