@extends('layouts.app')

@section('title','登録済み')

@section('content')
    <div class="container">
        <div class="row">
            <h2>あなたは登録済みです</h2>
        </div>
        <div class="col-md-6">
                        <a href="{{ action('ProfileController@description') }}" role="button" class="btn btn-primary">MYプロフィール</a>
         </div>
         <div class="col-md-6">
                        <a href="{{ action('CategoryController@index') }}" role="button" class="btn btn-success">TOP画面</a>
         </div>
    </div>
@endsection