@extends('layouts.bbs')
@section('title',"MYプロフィール")

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-md-4">MYプロフィール</h1>
            <p class="mx-auto col-md-4"><a href="{{ action('ProfileController@get_threads') }}" role="button" class="btn btn-primary btn-block">followスレッド一覧</a></p>
            <p class="mx-auto col-md-4"><a href="{{ action('ProfileController@get_follows') }}" role="button" class="btn btn-success btn-block">follow一覧</a> </p>
        </div>
        
        <div class="jumbotron text-center">
            <div class="profile">
                <div class="row">
                        <div class="h3 col-md-12 display-4">
                            {{ $user->name }}
                        </div>
                </div>
                <div class="row">
                    <label class="h5 col-md-2">誕生日</label>
                        <div class="h3 col-md-8">
                            {{$profile->birth_year}}年
                            {{$profile->birth_month}}月
                            {{$profile->birth_day}}日
                        </div>
                </div>
                <div class="row">
                    <label class="h5 col-md-2">性別</label>
                        <div class="h3 col-md-8">
                            {{ $profile->gender }}
                        </div>
                </div>
                <div class="row">
                    <label class="h5 col-md-2">趣味</label>
                        <div class="h3 col-md-8">
                            {{ $profile->hobby }}
                        </div>
                </div>
                <div class="row">
                    <label class="h5 col-md-2">自己紹介</label>
                        <div class="h3 col-md-8">
                            {{ $profile->introduction }}
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <a href="{{ action('ProfileController@edit',['id' => $profile->id]) }}" role="button" class="btn btn-primary btn-block">プロフィール編集</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection