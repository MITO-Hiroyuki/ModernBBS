@extends('layouts.bbs')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="{{ action('CategoryController@index') }}">カテゴリー</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active">スレッド</a>
			</li>
		</ul>
		
		<div class="mt-4">
			<a href="{{ action('ThreadController@create') }}">
				<button type="button" class="btn btn-primary btn-lg btn-block">新規スレッド投稿</button>
			</a>
		</div>
		
		@foreach($category_threads as $category_thread)
		<div class="card mt-4">
			
			<div class="card-header">
				<h2>{{ $category_thread->thread_title }}</h2>
			</div>
			
			<div class="card-body">
				<p>{{ $category_thread->body }}</p>
				@if($category_thread->follows->where('user_id',$user_id)->isNotEmpty())
				{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}
				@elseif($category_thread->user_id == $user_id)
				{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}
				@else
				{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}
				<a href="{{ action('FollowController@store', ['id' => $category_thread->user_id]) }}" role="button" class="btn btn-success">フォロー</a>
				@endif
			</div>
			
			<div class="card-footer">
				<a href="{{ action('ProfileController@get_profile', ['id' => $category_thread->profile_id]) }}">
					投稿者：
					@if ($category_thread->user != null)
						{{ $category_thread->user->name }}
					@endif
				</a>
				&nbsp;
				投稿日：{{ date("Y年 m月 d日",strtotime($category_thread->created_at)) }}
			</div>
		</div>
			
		@endforeach
		
		<div class="pagination justify-content-center mt-4">
			{{ $category_threads->links() }}
		</div>
		
	</div>
@endsection