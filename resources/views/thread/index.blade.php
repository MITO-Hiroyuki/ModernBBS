@extends('layouts.default')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<a href="{{ route('thread.create') }}" class="btn btn-primary">
				新規情報投稿
			</a>
		</div>
		
		@foreach($category->threads as $thread)
			<h2>タイトル：{{ $thread->thread_title }}
				<small>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</small>
			</h2>
			<p><a class="card-link" href="{{ route('profile.showThread', ['thread' => $thread->profile->id]) }}" >投稿者：{{ $thread->user->name }}</a></p>
			<p>カテゴリー：{{ $thread->category->name }}</p>
			<p>{{ $thread->body }}</p>
			<p>{{ link_to("/thread/{$thread->id}", '続きを読む', array('class' => 'btn btn-primary')) }}</p>
			<p>コメント数：{{ $thread->comment_count }}</p>
			<hr />
		@endforeach
	</div>
@endsection