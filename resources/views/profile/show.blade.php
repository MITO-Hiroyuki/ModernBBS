@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>{{ $profile->User->name }}のプロフィール</h1>
        <div class="jumbotron">
            <div class="profile">
                <div class="h3 display-4">
                    {{ $profile->User->name }}
                </div>
        </div>
        <div class="row">
            <label class="h5 col-md-2">誕生日</label>
                <div class="h3 col-md-8">
                    {{ $profile->birth_year }}年
                    {{ $profile->birth_month }}月
                    {{ $profile->birth_day }}日
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
    </div>
@endsection