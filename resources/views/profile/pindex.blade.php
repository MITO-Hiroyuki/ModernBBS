@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>profile</h1>
            <div class="profile">
                
                <ul>
                    @foreach($users as $user)
                    <li>
                    {{ $user->name }}
                    <a href="{{ action('FollowController@store', ['id' => $user->id]) }}" role="button" class="btn btn-success" type="submit">follow</a>
                    <a href="{{ action('FollowController@destroy', ['id' => $user->id]) }}" role="button" class="btn btn-danger" type="submit">unfollow</a>
                    
                    </li>
                    @endforeach

                    </ul>
            </div>
        </div>
@endsection