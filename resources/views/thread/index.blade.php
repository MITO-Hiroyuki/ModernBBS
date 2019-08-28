@extends('layouts.default')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		@foreach($threads as $thread)
			<h2>タイトル：{{ $thread->thread_title }}
				<small>投稿日：{{ date("Y年 m月 d日", strtotime($thread->created_at)) }}</small>
			</h2>
			<p>{{ link_to("/profile/{$thread->user->id}", '投稿者：{ $thread->user->name }', array('class => 'btn btn-primary')) }}</p>
			<p>カテゴリー：{{ $thread->category->name }}</p>
			<p>{{ $thread->body }}</p>
			<p>コメント数：{{ $thread->comment_count }}</p>
			<p>{{ link_to("/thread/{thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
			<hr />
		@endforeach
	</div>
@endsection