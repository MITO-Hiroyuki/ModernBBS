@extends('layouts.bbs')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<!--
		<h2>タイトル：{{ $thread->thread_title }}</h2>
		<p>投稿日：{{ date("Y年 m月 d日",strtotime($thread->created_at)) }}</p>
		<p><a href="{{ action('ProfileController@get_profile', $thread->profile_id) }}">
				投稿者：
				@if ($thread->user != null)
					{{ $thread->user->get()[0]->name }}
				@endif
			</a></p>
		<p>{{ $thread->body }}</p>
		<hr />
		-->
		
		<h3>コメント一覧</h3>
		
			@foreach((array)$thread->commets as $comment)
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
					<p>{{ link_to("/thread/response/{$comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}</p>
				</div>
			@endforeach
		
		<div="">
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
			
				<div class="form-group">
					<label for="comment_text" class="">コメント</label>
					<textarea class="form-control" name="comment_text">{{ old('comment_text') }}</textarea>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">コメント投稿</button>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
@endsection