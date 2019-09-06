@extends('layouts.bbs')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default">
                <div class="card-heading"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">You are logged in!</h3>
                </div>
                <div class="col-md-4 mx-auto">
                <a href="{{ action('ProfileController@create')}}" role="button" class="btn btn-primary">プロフィール作成
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
