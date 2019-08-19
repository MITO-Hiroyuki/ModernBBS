@extends('layout.default')
@section('title', 'コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		<h2>
			<small>投稿日：{{ date("Y年 m月 d日", strtotime($comment->created_at)) }}</small>
		</h2>
		<p>{{ $comment->comment_text }}</p>
		<hr />
		<h3>レスポンス一覧</h3>
			@foreach($comment->response as $comment_response)
				<p>レスポンスユーザー：{{ $comment_response->user_id->name }}</p>
				<p>{{ $comment_response->response_text }}</p><br />
			@endforeach
			
		<form method="response" action="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
		
			<div class="form-group">
				<label for="response" class="">レスポンス</label>
				<div class="">
						{{ Form::textarea('response_text', null, array('class => '')) }}
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">レスポンスを送る</button>
			</div>
			
		</form>
		
	</div>
@endsection