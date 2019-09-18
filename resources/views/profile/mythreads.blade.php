@extends('layouts.bbs')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<a href="{{ action('ThreadController@create') }}">
				<button type="button" class="btn btn-primary btn-lg btn-block">新規スレッド投稿</button>
			</a>
		</div>
		
		@foreach($threads as $thread)
		
			<div class="card mt-4">
				
				<div class="card-header">
					<h2>{{ $thread->thread_title }}</h2>
				</div>
			
				<div class="card-body">
					<p>{{ $thread->body }}</p>
					
					{{ link_to("/bbs/comment/comment/{$thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}

				</div>
				
				<div class="card-footer">
					<a href="{{ action('ProfileController@get_profile', ['id' => $thread->profile_id]) }}">
						投稿者：
						@if ($thread->user != null)
							{{ $thread->user->name }}
						@endif
					</a>
					&nbsp;
					投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}
				</div>
				
			</div>
		@endforeach
		
	</div>
@endsection