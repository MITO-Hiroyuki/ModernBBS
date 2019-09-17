@extends('layouts.bbs')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="{{ action('CategoryController@index') }}">カテゴリー</a>
			</li>
			<li class="nav-item">
				<a class="nav-link">スレッド</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active">コメント</a>
			</li>
		</ul>
		
		<div class="card mt-4">
			<div class="card-header">
				<h2>{{ $thread->thread_title }}</h2>
				<a href="{{ action('ProfileController@get_profile', $thread->profile_id) }}">
							投稿者：
							@if ($thread->user != null)
								{{ $thread->user->get()[0]->name }}
							@endif
				</a>
				&nbsp;
				投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}
			</div>
			<div class="card-body">
				<p>{{ $thread->body }}</p>
			</div>
			
		</div>
		
		<div class="mt-4">
			<h3>コメント一覧</h3>
		</div>
		
			@foreach($thread->comment as $comment)
				<div class="card mt-2">
					<div class="card-header">
						<a href="{{ action('ProfileController@get_profile', ['id' => $comment->profile_id]) }}">
							投稿者：
							@if ($comment->user != null)
								{{ $comment->user->name }}
							@endif
						</a>
						&nbsp;
						投稿日：{{ date("Y年 m月 d日",strtotime($comment->created_at)) }}
					</div>
					
					<div class="card-body">
						<p>{{ $comment->comment_text }}</p>
					</div>
					
					<div class="card-footer">
						<span>
							{{ link_to("/bbs/response/response/{$comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}
						</span>
						<div class="float-right">
							@if($comment->good->where('user_id',Auth::id())->isEmpty())
								<a href="{{ action('GoodController@store', ['id' => $comment->id]) }}" role="button" class="btn btn-primary">
									<i class="far fa-thumbs-up"></i>いいね！
									<span class="badge badge-light">
										{{ count($comment->good)}}
									</span>
								</a>
							@elseif($comment->good->where('user_id',Auth::id())->isNotEmpty())
								<a href="{{ action('GoodController@destroy', ['id' => $comment->id]) }}" role="button" class="btn btn-primary">
									<i class="fas fa-thumbs-up"></i>いいね！
									<span class="badge badge-light">
										{{ count($comment->good)}}
									</span>
								</a>
							@endif
						</div>
					</div>
						
				</div>
			@endforeach
			
		<div class="mt-4">
			
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
				
				<div class="form-group mt-2">
					<textarea class="form-control" name="comment_text">{{ old('comment_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">コメント投稿</button>
				</div>
				
			</form>
		</div>
		
	</div>
	
@endsection