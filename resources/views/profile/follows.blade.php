@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>profile</h1>
            <div class="profile">
                
                <ul>
                    @foreach($follows as $follow)
                    <li>
                        <a href="{{ action('ProfileController@get_profile', ['id' => $follow->followed_user_id]) }}">
                    {{ $follow->FollowUsers->name }}
                    </a>
                    <a href="{{ action('FollowController@destroy', ['id' => $follow->followed_user_id]) }}" role="button" class="btn btn-danger">unfollow</a>
                    
                    </li>
                    @endforeach

                    </ul>
            </div>
        </div>
@endsection