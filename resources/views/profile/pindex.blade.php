@extends('layouts.bbs')
@section('title',"プロフィール")

@section('content')
    <div class="container">
            <h1>profile</h1>
            <div class="profile">
                
                <ul>
                    @foreach($users as $user)
                    <li>
                    {{ $user->name }}    
                    </li>
                    @endforeach
                </ul>
                    
                
                </div>
        </div>
@endsection