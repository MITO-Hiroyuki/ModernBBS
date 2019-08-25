@extends('layouts.app')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-deck">
                @foreach($categories as $category)
                <!--Bootstrap3 offset-->
                        <div class="card bg-primary col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category->category }}</h3>
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
          <tbody>
            <tr>
              @foreach($new_threads as $new_thread)
              <td>{{ $new_thread->title }}</td>
              <td>{{ $new_thread->categories->category }}</td>
              <td>{{ $new_thread->profiles->users->name }}</td>
              <td>{{ $new_thread->created_at }}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
        <nav>
            <ul class="pagenation">
                <li><a class="page-link" href="#">Prev</a></li>
                <li>
                    1
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        </div>
    </div>
@endsection