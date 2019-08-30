@extends('layouts.default')
@section('title', 'コメント／レスポンス表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<small>投稿日：{{ date("Y年m月d日", strtotime($thread->created_at)) }}</small>
		<p>
			<a class="card-link" href="{{ route('comment.show', ['comment' => $comment->comment_profile_id->id]) }}" >投稿者：{{ optional($comment->comment_profile_id)->name }}</a>
		</p>
		<p>{{ $comment->comment_text }}</p>
		
		<hr />
		
		<h3>レスポンス一覧</h3>
		
			@foreach($comment->response as $comment_response)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['response' => $response->response_profile_id->id]) }}" >コメント投稿者：{{ optional($comment->response_profile_id)->name }}</a></p>
					<p>{{ $response->response_text }}</p><br />
				</div>
			@endforeach
			
		<form class="" method="post" action="{{ route('responses.store') }}">
			@csrf
			<input name="comment_id" type="hidden" value="{{ $response->id }}">
			<div class="form-group">
				<label for="response_text">コメント</label>
				<textarea id="response_text" name="response_text" class=form-control {{erros->has('response_text') ? 'is-invalid' : '' }}" >
					{{ old('response_text') }}
				</textarea>
				@if($error->has('response_text'))
					<div class="invalid-feedback">
						{{ $errors->first('response_text') }}
					</div>
				@endif
			</div>
			<input type="submit" class="btn btn-primary" value="コメント送信">
		</form>
		
		<div class="d-flex justify-countent-center mb-5">
			{{ $responses->links() }}
		</div>
		
	</div>
	
@endsection