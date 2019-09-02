@extends('layouts.default')
@section('title', 'スレッド／コメント表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<h2>{{ $thread->thread_title }}
		<small>投稿日：{{ $thread->created_at->format('Y.m.d') }}</small>
		</h2>
		<p>
			<a class="card-link" href="{{ route('profile.show', ['comment' => $comment->comment_profile_id->id]) }}" >投稿者：{{ optional($thread->comment_profile_id)->name }}</a>
		</p>
		<p>カテゴリー：{{ optional($thread->category_id)->name }}</p>
		<p>{{ $thread->body }}</p>
		
		<hr />
		
		<h3>コメント一覧</h3>

		
			@foreach($thread->comments as $comment)
				<div>
					<p><a class="card-link" href="{{ route('profile.show', ['comment' => $comment->comment_profile_id->id]) }}" >コメント投稿者：{{ optional($comment->comment_profile_id)->name }}</a></p>
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
							
					<p>レスポンス数：{{ $comment->response_count }}</p>
					<p><a class="card-link" href="{{ route('thread.comment.resposne', ['comment' => $comment]) }}">レスポンスを読む</a></p>
				</div>
			@endforeach
		
		<form class="" method="post" action="{{ route('comments.store') }}">
			@csrf
			<input name="thread_id" type="hidden" value="{{ $thread->id }}">
			<div class="form-group">
				<label for="comment_text">コメント</label>
				<textarea id="comment_text" name="comment_text" class=form-control {{erros->has('comment_text') ? 'is-invalid' : '' }}" >
					{{ old('comment_text') }}
				</textarea>
				@if($error->has('comment_text'))
					<div class="invalid-feedback">
						{{ $errors->first('comment_text') }}
					</div>
				@endif
			</div>
			<input type="submit" class="btn btn-primary" value="コメント送信">
		</form>
		
		<div class="d-flex justify-countent-center mb-5">
			{{ $comments->links() }}
		</div>
		
	</div>
	
@endsection