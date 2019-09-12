@extends('layouts.bbs')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<h2>{{ $thread->thread_title }}</h2>
		<p>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</p>
		<p><a href="{{ action('ProfileController@get_profile', ['id' => $thread->profile_id]) }}">
				投稿者：
				@if ($thread->user != null)
					{{ $thread->user->get()[0]->name }}
				@endif
			</a></p>
		<p>{{ $thread->body }}</p>
		<hr />
		
		<h3>コメント一覧</h3>
		
			@foreach($thread->comment as $comment)
				<div class="card mt-2">
					<div class="card-header">
						<div class="">
							<a href="{{ action('ProfileController@get_profile', ['id' => $comment->profile_id]) }}">
							投稿者：
							@if ($comment->user != null)
								{{ $comment->user->name }}
							@endif
							</a>
						</div>
						<div class="">
							投稿日：{{ date("Y年 m月 d日",strtotime($comment->created_at)) }}
						</div>
					</div>
					
					<div class="card-body">
						<p>{{ $comment->comment_text }}</p>
						<span>
							{{ link_to("/bbs/response/response/{$comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}
						</span>
						<div class="float-right">
							@if($comment->good->where('user_id',Auth::id())->isEmpty())
							<p>
							<a href="{{ action('GoodController@store', ['id' => $comment->id]) }}" role="button" class="btn btn-primary"><i class="far fa-thumbs-up"></i>いいね!
							<span class="badge badge-light">{{ count($comment->good)}}</span></a></p>
							@elseif($comment->good->where('user_id',Auth::id())->isNotEmpty())
							<a href="{{ action('GoodController@destroy', ['id' => $comment->id]) }}" role="button" class="btn btn-primary"><i class="fas fa-thumbs-up"></i>いいね!
							<span class="badge badge-light">{{ count($comment->good)}}</span></a></p>
							@endif
						</div>
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