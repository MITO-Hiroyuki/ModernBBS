@extends('layouts.app')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row-md-12">
            <div class="card-deck">
                @foreach($categories as $category)
                        <div class="card bg-primary col-md-4">
                            <h3 class="card-title text-center">{{ $category->category }}</h3>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection