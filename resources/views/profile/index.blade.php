@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>クラスメイト一覧</h1>
            <div class="profile">
                <div class="row">
                <table class="table col-md-12">
                    <thead>
                        <tr>
                            <td>名前</td>
                            <td>follow</td>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td><a href="{{ action('ProfileController@get_profile', ['id' => $user->id]) }}">
                                {{ $user->name }}
                            </a>
                            </td>
                            @if($user->id == Auth::id())
                             <td></td>
                             @continue
                            @elseif(Auth::user()->follows->where('id',$user->id)->isEmpty())
                            <td>
                            <a href="{{ action('FollowController@store', ['id' => $user->id]) }}" role="button" class="btn btn-success btn-block">follow</a>
                            </td>
                            @elseif(Auth::user()->follows->where('id',$user->id)->isNotEmpty())
                            <td>
                            <a href="{{ action('FollowController@destroy', ['id' => $user->id]) }}" role="button" class="btn btn-danger btn-block">unfollow</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
            </div>
        </div>
@endsection