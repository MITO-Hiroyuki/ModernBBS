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
		
		/*
		$rules = [
			'response_text' => 'required',
			];
		
		$messages = array(
			'response_text.required' => '本文を正しく入力して下さい',
			);
		
		//$response->user_id = $request->user()->id;
		
		$validator = $Varidator::make(Input::all(), $rules, $messages);
		
		if ($validator->passes()) {
			$response = new Response;
			$response->user_id = Input::get('user_id');
			$response->response_text = Input::get('response_text');
			$response->comment_id = Input::get('comment_id');
			$response->save();
			return redirect()->back()->with('message', '投稿が完了しました');
		} else {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		*/
	}
}
