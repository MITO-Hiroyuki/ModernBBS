@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $profile->users->name }}プロフィール</h2>
        </div>
        <div class="row">
            <label class="col-md-2">氏名</label>
                <div class="col-md-8">
                    {{ $profile->users->name }}
                </div>
        </div>
        <div class="row">
            <label class="col-md-2">誕生日</label>
                <div class="col-md-8">
                    {{ $profile->birth_year }}年
                    {{ $profile->birth_month }}月
                    {{ $profile->birth_day }}日
                </div>
        </div>
        <div class="row">
            <label class="col-md-2">性別</label>
                <div class="col-md-8">
                    {{ $profile->gender }}
                </div>
        </div>
        <div class="row">
            <label class="col-md-2">趣味</label>
                <div class="col-md-8">
                    {{ $profile->hobby }}
                </div>
        </div>
        <div class="row">
            <label class="col-md-2">自己紹介</label>
                <div class="col-md-8">
                    {{ $profile->introduction }}
                </div>
        </div>
        <div class="row">
            <a href="{{ action('CategoryController@index') }}" role="button" class="btn btn-success">TOP画面</a>
        </div>
    </div>
@endsection