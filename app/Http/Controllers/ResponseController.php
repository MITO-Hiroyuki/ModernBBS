<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Comment;
use App\Response;

class ResponseController extends Controller
{
	public function add()
	{
		return redirect()->back();
	}
	
	public function create(Request $request)
	{
		$this->validate($request, Response::$rules);
		
		$response = new Response;
		$response->user_id = Auth::user()->id;
		$response->profile_id = Auth::user()->profile_id;
		$form = $request->all();
		
		unset($form['_token']);
		unset($form['image']);
		
		$response->fill($form);
		$response->save();
		
		return redirect()->back()->with('message', '投稿が完了しました');
	}
}
