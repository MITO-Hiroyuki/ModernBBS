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
				<p>{{ $comment_response->response_text }}</p><br />
			@endforeach
	</div>
@endsection