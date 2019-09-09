@extends('layouts.default')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<a href="{{ action('ThreadController@create') }}"><button type="button">新規情報投稿</button></a>
			<hr />
		</div>
		
		@foreach($category_threads as $category_thread)
			<h2>{{ $category_thread->thread_title }}</h2>
			<p>投稿日：{{ date("Y年 m月 d日",strtotime($category_thread->created_at)) }}</p>
			<p><a href="{{ action('ProfileController@get_profile', $category_thread->profile_id) }}">
				投稿者：
				@if ($category_thread->user != null)
					{{ $category_thread->user->get()[0]->name }}
				@endif
			</a></p>
			<p>{{ $category_thread->body }}</p>
			<p>{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
			<hr />
		@endforeach
	</div>
@endsection