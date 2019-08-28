@extends('layouts.bbs')
@section('title', 'ModernBBS')

@section('content')
    <div class="container">
        <div class="row">
            

                <!--Bootstrap4 offset(Bootstrap3"col-md-offset-1")-->
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category1->name }}</h3>
                        </div>
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category2->name }}</h3>
                        </div>
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category3->name }}</h3>
                        </div>
                        
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category4->name }}</h3>
                        </div>
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category5->name }}</h3>
                        </div>
                        <div class="panel col-md-3 col-md-offset-1">
                            <h3 class="card-title text-center">{{ $category6->name }}</h3>
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
              <td>test</td>
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