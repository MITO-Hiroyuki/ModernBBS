@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">You are logged in!</h3>
                    
                    <div class="col-md-4 col-md-offset-2">
                        <a href="{{ action('ProfileController@add') }}" role="button" class="btn bt-block btn-primary">プロフィール作成</a>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                    <a href="{{ action('CategoryController@index') }}" role="button" class="btn btn-success">TOP画面</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
