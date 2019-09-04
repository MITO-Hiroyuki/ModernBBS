@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>profile</h1>
            <div class="profile">
                
                <ul>
                    @foreach($users as $user)
                    <li>
                        <a href="{{ action('ProfileController@get_profile', ['id' => $user->id]) }}">
                    {{ $user->name }}
                    </a>
                    <a href="{{ action('FollowController@store', ['id' => $user->id]) }}" role="button" class="btn btn-success">follow</a>
                    <a href="{{ action('FollowController@destroy', ['id' => $user->id]) }}" role="button" class="btn btn-danger">unfollow</a>
                    
                    </li>
                    @endforeach

                    </ul>
            </div>
        </div>
@endsection