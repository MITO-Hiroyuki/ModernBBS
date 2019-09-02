@extends('layouts.default')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<h2>タイトル：{{ $thread->thread_title }}
				<small>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</small>
		</h2>
		<p><a class="card-link" href="{{ route('profile.show', ['thread' => $thread->profile->id]) }}" >投稿者：{{ $thread->user->name }}</a></p>
		<p>カテゴリー：{{ $thread->category->name }}</p>
		<p>{{ $thread->body }}</p>
		<hr />
		
		<h3>コメント一覧</h3>
<<<<<<< HEAD
		
			@foreach($thread->comments as $comment)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['comment' => $comment->profile->id]) }}" >コメント投稿者：{{ $comment->user->name }}</a></p>
					<p>{{ $comment->comment_text }}</p>
					
						@if (@good)
							{{ Form::model($comment, array('action' => array('GoodController@destroy', $comment->id, $good->id))) }}
								<button type="submit">
									<i class="fas fa-thumbs-up"></i>{{ $comment->good_count }}
								</button>
							{{!! Form::close() !!}
						@else
							{{ Form::model($comment, array('action' => array('GoodController@store', $comment->id))) }}
								<button type="submit">
									<i class="far fa-thumbs-up"></i>{{ $comment->good_count }}
								</button>
							{!! Form::close() !!}
						@endif
							
					@if($comment->response->count())
						<span>レスポンス数：{{ $comment->response->count() }}件</span>
					@endif
					<p>{{ link_to("/thread/{$comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}</p>
				</div>
			@endforeach
		
		<div="">
			<h3>コメント投稿</h3>
				
			@if(Session::has('message'))
				<div class="bg-info">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
=======

		
			@foreach($thread->comments as $comment)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['comment' => $comment->comment_profile_id->id]) }}" >コメント投稿者：{{ optional($comment->comment_profile_id)->name }}</a></p>
					<p>{{ $comment->comment_text }}</p>
>>>>>>> 1e4237c3f9b504fa5634e6960647ecd05d282446
					
			{{ Form::open(['route' => 'comment.store'], array('class' => '')) }}
				
				<div class="form-group">
					<label for="comment_text" class="">本文</label>
					<div class="">
						{{ Form::textarea('comment_text', null, array('class' => '')) }}
					</div>
				</div>
				
				{{ Form::hidden('user_id', $user->id) }}
				{{ Form::hidden('thread_id', $thread->id) }}
				
				<div class="from-group">
					<button type="submit" class="btn btn-primary"></button>コメント投稿</button>
				</div>
					
			{{ Form::close() }}
				
		</div>
		
		<div class="d-flex justify-countent-center mb-5">
			{{ $comments->links() }}
		</div>
		
	</div>
	
@endsection