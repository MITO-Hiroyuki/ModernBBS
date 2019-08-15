@extends('layout.app')
@section('title', 'スレッド表示')
@section('content')
	<div class="col-md-8 mx-auto">
		<h2>タイトル：{{ $thread->thread_title }}
			<small>投稿日：{{ date("Y年 m月 d日", strtotime($thread->created_at)) }}</small>
		</h2>
		<p>カテゴリー：{{ $thread->category->name }}</p>
		<p>{{ $thread->body }}</p>
		<hr />
		<h3>コメント一覧</h3>
			@foreach($thread->comment as $thread_comment)
				<p>{{ $thread_comment->comment_text }}</p><br />
			@endforeach
	</div>
@endsection