@extends('layouts.default')
@section('title', 'スレッド表示')
@section('content')
	<div class="col-md-8 mx-auto">
		
		small>投稿日：{{ $thread->created_at->format('Y.m.d') }}</small>
			
		<p>{{ link_to("/profile/{ optional($thread->thread_profile_id)->id}", '投稿者：{ optional($thread->thread_profile_id)->name }', array('class' => 'btn btn-primary')) }}</p>
		<p>カテゴリー：{{ optional($thread->category_id)->name }}</p>
		<p>{{ $thread->body }}</p>
		
		<hr />
		
		<h3>コメント一覧</h3>
			@foreach ($thread->comments as $comment)
				<p>コメントユーザー：{{ optional($comment->user_id)->name }}</p>
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
				<p>{{ link_to("/response/{comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}</p><br />
			@endforeach
			
		{{ Form::open(['route' => 'bbs.store'], array('class' => 'form')) }}
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
		
			<div class="form-group">
				<label for="comment" class="">コメント</label>
				<div class="">
						{{ Form::textarea('comment_text', null, array('class' => '')) }}
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">コメントを送信する</button>
			</div>
			
		{{ Form::close() }}
		
	</div>
	
@endsection