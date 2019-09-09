<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class ResponseController extends Controller
{
	public function show()
	{
		$Responses = Response::all();
		return view('thread.response')->with('responses', $responses);
	}
	
	public function create()
	{
		
	}
	
	public function store()
	{
		$validator = Validator::make($request->all(), [
			'response_text' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('response/show')
						->withErrors($validator)
						->withInput();
		} else {
			return redirect()
						->back()
						->with('message', '投稿が完了しました');
		}
	}
}
