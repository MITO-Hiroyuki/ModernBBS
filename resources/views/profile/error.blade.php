@extends('layouts.app')

@section('title','登録済み')

@section('content')
    <div class="container">
        <div class="row">
            <h2>あなたは登録済みです</h2>
        </div>
        <div class="col-md-12">
                        <a href="{{ action('ProfileController@description') }}" role="button" class="btn bt-block btn-primary">MYプロフィール</a>
         </div>
    </div>
@endsection