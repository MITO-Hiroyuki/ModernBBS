<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        
        $followedUser = User::findOrFail($request->input('id'));
        FollowUser::findOrCreate([
            'user_id' => Auth::id(),
            'followed_user_id' => $followedUser->id,
            ]);
        return back()->withInput();
        
    }
    
    public function destory($id)
    {
        $followedUser = User::findOrFail($id);
        $user = Auth::user();
        $user->follows()->detach($followedUser->id);
    return back()->withInput();
    }
}
