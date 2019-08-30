<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
    public function add(){
        
        $user = Auth::user();
        $user_id = $user->id;
        $profile = Profile::where('user_id',$user_id)->get();
        
        if(!$profile->isEmpty()){
                return view('profile.error');
            }
            
        return view('profile.create');
        
    }
    
    public function create(Request $request){
        
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
        unset($form['_token']);
        $user = Auth::user();
        $profile->user_id = $user->id;
        $profile->fill($form)->save();
        
        return redirect()->route('myprofile');
        
    }
    
        
    public function edit(Request $request){
        
        $user_id = Auth::user()->id;
        $profile = Profile::find($request->id);
        
        if (empty($profile)) {
        abort(404);    
        }
        
        return view('profile.edit', ['profile' => $profile]);
        
    }


    public function update(Request $request){
        
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();

        return redirect()->route('myprofile');
        
    }
    
    public function description(Request $request){
        
        $user = Auth::user();
        $user_id = $user->id;
        $user_name = $user->name;
        $profile = Profile::where('user_id',$user_id)->get();
        if($profile->isEmpty()){
            return view('profile.create');    
        }
        
        $profile = $profile[0];
        return view('profile.myprofile', ['profile' => $profile, 'user_name' => $user_name]);
        
    }
    
    public function get_profile(Request $request){
        
        $user_id = $request->id;
        $profile = Profile::where('user_id',$user_id)->get();
        $profile = $profile[0];
        
        return view('profile.show', ['profile' => $profile,]);
    }
}
