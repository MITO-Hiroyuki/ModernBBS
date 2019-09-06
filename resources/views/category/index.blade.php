@extends('layouts.bbs')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="card-panel">
                        <div class="card card1">
                            <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category1->category_id) }}">
                            {{ $category1->name }}</a></h1>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="card card2">
                            <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category2->category_id) }}">
                            {{ $category2->name }}</a></h1>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="card card3">
                             <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category3->category_id) }}">
                            {{ $category3->name }}</a></h1>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="card card4">
                            <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category4->category_id) }}">
                            {{ $category4->name }}</a></h1>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="card card5">
                            <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category5->category_id) }}">
                            {{ $category5->name }}</a></h1>
                        </div>
                    </div>
                    <div class="card-panel">
                        <div class="card card6">
                            <h1 class="card-body"><a href="{{ action('ThreadController@showThread', $category6->category_id) }}">
                            {{ $category6->name }}</a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                <p>新着スレッド一覧</p>
                    <div class="card newthread">
                        <div class="list-group">
                          @foreach($threads as $thread)
                              <a href="{{ action('ThreadController@show',['id' => $thread->id] ) }}">
                                  <h4 class="list-group-item-heading">{{ $thread->thread_title }}</h4>
                              <p class="list-group-item-text">{{ $thread->Category->name }}</p>
                          @endforeach
                         </div>
                        <div class="newthread-pagination pagination-sm">
                        {{ $threads->links() }}
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection