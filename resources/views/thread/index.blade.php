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
			<p>{{ $category_thread->body }}</p>
			<p>{{ link_to("/profile/show/{$category_thread->profile_id}", "投稿者：{ $category_thread->user->name }", array('class' => 'btn btn-primary')) }}</p>
			<p>{{ link_to("/bbs/comment/index/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
			<hr />
		@endforeach
	</div>
@endsection