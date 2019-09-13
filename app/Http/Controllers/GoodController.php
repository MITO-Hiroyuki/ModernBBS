<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
		
		return back()->withInput();
	}
	
	public function destroy($commentId)
	{
		$good = Good::where('comment_id',$commentId)->firstOrFail();
		$coment = Comment::findOrFail($commentId);
		Good::where('user_id',Auth::id())->where('comment_id',$commentId)->delete();
		return back()->withInput();
	}
	
}
