<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Good;
use App\Comment;

class GoodController extends Controller
{
	public function store(Request $request, $commentId)
	{
		Good::create(
			array(
				'user_id' => Auth::user()->id,
				'comment_id' => $commentId
				)
			);
		
		$comment = Comment::findOrFail($commentId);
		
		return redirect()->action('CommentController@show', $comment->id);
	}
	
	public function destroy($commentId, $likeId)
	{
		$comment = Comment::findOrFail($postId);
		$comment->good_by()->findOrFail($likeId)->delete();
		
	return redirect()->action('CommentController@show', $comment->id);
	}
	
}
