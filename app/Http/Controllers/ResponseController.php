<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class ResponseController extends Controller
{
	public function Response()
	{
		$response = Response::all();
		return view('thread.response', ['responses' => $responses]);
	}
	
	public function store(Request $request)
	{
		$rules = [
			'response_text' => 'required',
			];
		
		$messages = array(
			'response_text.required' => '本文を正しく入力して下さい',
			);
		
		$response->user_id = $request->user()->id;
		
		$validator = $Varidator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$response = new Response;
			$response->response_text = Input::get('response_text');
			$response->comment_id = Input::get('comment_id');
			$response->save();
			return Redirect::back()->with('message', '投稿が完了しました');
		} else {
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}
	}
}
