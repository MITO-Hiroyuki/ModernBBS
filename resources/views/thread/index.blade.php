@extends('layouts.default')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		@foreach($threads as $thread)
			<h2>タイトル：{{ $thread->thread_title }}
				<small>投稿日：{{ $thread->created_at->format('Y.m.d') }}</small>
			</h2>
			<p><a class="card-link" href="{{ route('profile.show', ['comment' => $comment->comment_profile_id->id]) }}" >投稿者：{{ optional($thread->thread_profile_id)->name }}</a></p>
			<p>カテゴリー：{{ optinal($thread->category_id)->name }}</p>
			<p>{{ $thread->body }}</p>
			<p>コメント数：{{ $thread->comment_count }}</p>
			<p><a class="card-link" href="{{ route('comment.comment', ['comment' => $comment]) }}">コメントを読む</a></p>
			<hr />
		@endforeach
	</div>
@endsection