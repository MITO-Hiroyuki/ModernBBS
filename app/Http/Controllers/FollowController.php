<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        
        $followedUser = User::findOrFail($request->input('id'));
        Follow::firstOrCreate([
            'user_id' => Auth::id(),
            'followed_user_id' => $followedUser->id,
            ]);
            
        return back()->withInput();
        
    }
    
    public function destroy(Request $request)
    {   
        
        $followedUser = User::findOrFail($request->id);

        $user = Auth::user();
        $user->follows()->detach($followedUser->id);
        return back()->withInput();
    }
}
