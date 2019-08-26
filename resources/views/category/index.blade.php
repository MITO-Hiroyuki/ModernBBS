@extends('layouts.app')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-deck">
                @foreach($categories as $category)
                <!--Bootstrap3 offset-->
                        <div class="card bg-primary col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category->name }}</h3>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="row">
        <h5>新着スレッド一覧</h5>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>タイトル</th>
              <th>カテゴリー</th>
              <th>投稿者</th>
              <th>投稿日</th>
            </tr>
          </thead>
          @foreach($threads as $thread)
          <tbody>
            <tr>
              
              <td>{{ $thread->thread_title }}</td>
              <td>{{ $thread->Category->name }}</td>
              <td>{{ $thread->Profile->User->name }}</td>
              <td>{{ $thread->created_at }}</td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
        <div class="text-center">
        {{ $threads->links() }}
        </div>
        </div>
    </div>
    </div>
@endsection