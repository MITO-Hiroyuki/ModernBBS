<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function store($id)
    {
        $followedUser = User::findOrFail($id);
        Follow::firstOrCreate([
            'user_id' => Auth::id(),
            'followed_user_id' => $followedUser->id,
            ]);
            
        return back()->withInput();
        
    }
    
    public function destroy($id)
    {   
        
        $followedUser = User::findOrFail($id);

        $user = Auth::user();
        $user->follows()->detach($followedUser->id);
        return back()->withInput();
    }
}
