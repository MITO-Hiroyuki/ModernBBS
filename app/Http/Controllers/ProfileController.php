<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function add(){
        return view('profile.create');
    }
    
    public function create(Request $request){
        $this->validate($request,Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        $user = Auth::user();
        $profile->user_id = $user->id;
        $profile->fill($form)->save();
        return redirect('');
    }

}
