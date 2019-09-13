@extends('layouts.bbs')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<a href="{{ action('ThreadController@create') }}"><button type="button">新規情報投稿</button></a>
			<hr />
		</div>
		
		@foreach($follows as $follow)
		 @foreach($follow->threads as $thread)
			<h2>{{ $thread->thread_title }}</h2>
			<p>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</p>
			<p><a href="{{ action('ProfileController@get_profile', ['id' => $thread->profile_id]) }}">
				投稿者：
				@if ($thread->user != null)
					{{ $thread->user->name }}
				@endif
			</a></p>
			<p>{{ $thread->body }}</p>

		  	<p>{{ link_to("/bbs/comment/comment/{$thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
		  	
		 @endforeach
		@endforeach
	</div>
@endsection