@extends('layouts.default')
@section('title', 'コメント／レスポンス表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<p>投稿日：{{ date("Y年m月d日", strtotime($comment->created_at)) }}</p>
		<p><a class="card-link" href="{{ route('profile.show', ['comment' => $comment->profile->id]) }}" >投稿者：{{ $comment->profile->name }}</a></p>
		<p>{{ $comment->comment_text }}</p>
		
		<hr />
		
		<h3>レスポンス一覧</h3>
		
			@foreach($comment->responses as $response)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['response' => $response->profile->id]) }}" >レスポンス投稿者：{{ $response->user->name }}</a></p>
					<p>{{ $response->response_text }}</p><br />
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
			
				<div class="form-group">
					<label for="response_text" class="">レスポンス</label>
					<textarea class="form-control" name="response_text">{{ old('response_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">レスポンス投稿</button>
				</div>
				
			</form>
		</div>
		
		<div class="d-flex justify-countent-center mb-5">
			{{ $responses->links() }}
		</div>
		
	</div>
	
@endsection