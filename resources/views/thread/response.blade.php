@extends('layouts.default')
@section('title', 'コメント／レスポンス表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<small>投稿日：{{ date("Y年m月d日", strtotime($comment->created_at)) }}</small>
		<p>
			<a class="card-link" href="{{ route('profile.show', ['comment' => $comment->profile->id]) }}" >投稿者：{{ $comment->profile->name }}</a>
		</p>
		<p>{{ $comment->comment_text }}</p>
		
		<hr />
		
		<h3>レスポンス一覧</h3>
		
			@foreach($comment->response as $comment_response)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['response' => $response->profile->id]) }}" >コメント投稿者：{{ $response->user->name }}</a></p>
					<p>{{ $response->response_text }}</p><br />
				</div>
			@endforeach
			
		<div="">
			<h3>レスポンス投稿</h3>
				
			@if(Session::has('message'))
				<div class="bg-info">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
					
			{{ Form::open(['route' => 'response.store'], array('class' => '')) }}
				
				<div class="form-group">
					<label for="response_text" class="">本文</label>
					<div class="">
						{{ Form::textarea('response_text', null, array('class' => '')) }}
					</div>
				</div>
				
				{{ Form::hidden('comment_id', $comment->id) }}
				
				<div class="from-group"></div>
					<button type="submit" class="btn btn-primary"></button>コメント投稿</button>
				</div>
					
			{{ Form::close() }}
				
		</div>
		
		<div class="d-flex justify-countent-center mb-5">
			{{ $responses->links() }}
		</div>
		
	</div>
	
@endsection