@extends('layouts.bbs')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-panel col-md-10">
                <!--Bootstrap4 offset(Bootstrap3"offset-md-1")-->
                <div class="card card1">
                    <h3 class="text-center">{{ $category1->name }}</h3>
                </div>
                <div class="card card2">
                    <h3 class="text-center">{{ $category2->name }}</h3>
                </div>
                <div class="card card3">
                    <h3 class="text-center">{{ $category3->name }}</h3>
                </div>
                <div class="card card4">
                    <h3 class="text-center">{{ $category4->name }}</h3>
                </div>
                <div class="card card5">
                    <h3 class="text-center">{{ $category5->name }}</h3>
                </div>
                <div class="card card6">
                    <h3 class="text-center">{{ $category6->name }}</h3>
                </div>
            </div>
            <div class="col-md-2">
                <p>新着スレッド一覧</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>タイトル</th>
                      <th>カテゴリー</th>
                  </thead>
                  @foreach($threads as $thread)
                  <tbody>
                    <tr>
                      <td><a href="{{ action('ThreadController@show',['id' => $thread->id] ) }}">{{ $thread->thread_title }}</td>
                      <td>{{ $thread->Category->name }}</td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                {{ $threads->links() }}
            </div>
            </div>
        </div>
    </div>
@endsection