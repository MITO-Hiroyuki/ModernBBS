@extends('layouts.bbs')
@section('title', 'コメント／レスポンス表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="{{ action('CategoryController@index') }}">カテゴリー</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ action('ThreadController@showThread', $comment->thread->category_id) }}">スレッド</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ action('CommentController@show', $comment->thread_id) }}">コメント</a></a>
			</li>
			<li class="nav-item">
				<a class="nav-link active">レスポンス</a>
			</li>
		</ul>
		
		<div class="card mt-4">
			<div class="card-header">
				<a href="{{ action('ProfileController@get_profile', ['id' => $comment->profile_id]) }}">
					投稿者：
					@if ($comment->user != null)
						{{ $comment->user->get()[0]->name }}
					@endif
				</a>
				&nbsp;
				投稿日：{{ date("Y年m月d日", strtotime($comment->created_at)) }}
			</div>
			<div class="card-body">
				<p>{{ $comment->comment_text }}</p>
			</div>
		</div>
		
		<div class="mt-4">
			<h3>レスポンス一覧</h3>
		</div>
		
			@foreach($comment->response as $response)
				<div class="card mt-2">
					<div class="card-header">
						<a href="{{ action('ProfileController@get_profile', ['id' => $response->profile_id]) }}">
						投稿者：
						@if ($response->user != null)
								{{ $response->user->name }}
						@endif
						</a>
						&nbsp;
						投稿日：{{ date("Y年 m月 d日",strtotime($response->created_at)) }}
					</div>
					<div class="card-body">
						<p>{{ $response->response_text }}</p><br />
					</div>
				</div>
				
			@endforeach
			
		<div class="mt-4">
			<form action="{{ action('ResponseController@create') }}" method="post" enctype="multipart/form-date">
			@csrf
			
				@if (count($errors) > 0)
					<ul>
						@foreach($errors->all() as $e)
							<li>{{ $e }}</li>
						@endforeach
					</ul>
				@endif
				
				<input name="comment_id" type="hidden" value="{{ $comment->id }}">
				
				<div class="form-group mt-2">
					<textarea class="form-control" name="response_text">{{ old('response_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">レスポンス投稿</button>
				</div>
				
			</form>
		</div>
		
	</div>
	
@endsection