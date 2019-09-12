@extends('layouts.bbs')
@section('title', 'コメント／レスポンス表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<p><a href="{{ action('ProfileController@get_profile', $comment->profile_id) }}">
				投稿者：
				@if ($comment->user != null)
					{{ $comment->user->get()[0]->name }}
				@endif
			</a></p>
			<p>{{ $comment->comment_text }}</p>
			<p>投稿日：{{ date("Y年m月d日", strtotime($comment->created_at)) }}</p>
		</div>
		
		<h3>レスポンス一覧</h3>
		
			@foreach($comment->response as $response)
				<div class="card mt-2">
					<div class="card-header">
						<div class="">
							<a href="{{ action('ProfileController@get_profile', $response->profile_id) }}">
							投稿者：
							@if ($response->user != null)
								{{ $response->user->name }}
							@endif
							</a>
						</div>
						<div class="">
							投稿日：{{ date("Y年 m月 d日",strtotime($response->created_at)) }}
						</div>
					</div>
					<div class="card-body">
						<p>{{ $response->response_text }}</p><br />
					</div>
				</div>
				
			@endforeach
			
		<div="">
			<h3>レスポンス投稿</h3>
			
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
				
				<div class="form-group">
					<label for="response_text" class="">レスポンス</label>
					<textarea class="form-control" name="response_text">{{ old('response_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">レスポンス投稿</button>
				</div>
				
			</form>
		</div>
		
	</div>
	
@endsection