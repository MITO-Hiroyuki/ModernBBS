@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>Follow一覧</h1>
            <div class="row">
                <table class="table col-md-12">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <td></td>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach($follows as $follow)
                        <tr>
                            <th><a href="{{ action('ProfileController@get_profile', ['id' => $follow->followed_user_id]) }}">
                            {{ $follow->FollowUsers->name }}
                            </a>
                            </th>
                            <td>
                            <a href="{{ action('FollowController@destroy', ['id' => $follow->followed_user_id]) }}" role="button" class="btn btn-danger">unfollow</a>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
@endsection