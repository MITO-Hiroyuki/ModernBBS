@extends('layouts.bbs')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<!--
		<h2>タイトル：{{ $thread->thread_title }}</h2>
		<p>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</p>
		<p><a href="{{ action('ProfileController@get_profile', $thread->profile_id) }}">
				投稿者：
				@if ($thread->user != null)
					{{ $thread->user->get()[0]->name }}
				@endif
			</a></p>
		<p>{{ $thread->body }}</p>
		<hr />
		-->
		
		<h3>コメント一覧</h3>
		
			@foreach($thread->comment as $comment)
				<div class="card">
					<div class="card-header">
						<p><a href="{{ action('ProfileController@get_profile', $comment->profile_id) }}">
							投稿者：
							@if ($comment->user != null)
								{{ $comment->user->name }}
							@endif
						</a></p>
						<p>投稿日：{{ date("Y年 m月 d日",strtotime($comment->created_at)) }}</p>
					</div>
					
					<div class="card-body">
						<p>{{ $comment->comment_text }}</p>
						
						<span class="badge badge-primary">
							{{ link_to("/bbs/response/response/{$comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}
						</span>
					</div>
				</div>
			@endforeach
		
		<div class="">
			<h3>コメント投稿</h3>
			
			<form action="{{ action('CommentController@create') }}" method="post" enctype="multipart/form-date">
			@csrf
			
				@if (count($errors) > 0)
					<ul>
						@foreach($errors->all() as $e)
							<li>{{ $e }}</li>
						@endforeach
					</ul>
				@endif
				
				<input name="thread_id" type="hidden" value="{{ $thread->id }}">
				
				<div class="form-group">
					<label for="comment_text">コメント</label>
					<textarea class="form-control" name="comment_text">{{ old('comment_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">コメント投稿</button>
				</div>
				
			</form>
		</div>
		
	</div>
	
@endsection