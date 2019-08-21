@extends('layouts.app')
@section('title',"MYプロフィール")

@section('content')
    <div class="container">
        <div class="row">
            <h2>MYプロフィール</h2>
        </div>
        <div class="col-md-2">
            <a href="{{ action('ProfileController@edit',['id' => $profile->id]) }}" role="button" class="btn btn-primary">編集</a>
        </div>
        <div class="row">
            <label class="col-md-2">ポストネーム</label>
            <div class="col-md-8 mx-auto">
                {{ $user_name }}
            </div>
        </div>
        <div class="row">
            <label class="col-md-2">自己紹介</label>
            <div class="col-md-8 mx-auto">
                {{ $profile->introduction }}
            </div>
        </div>
    </div>
@endsection