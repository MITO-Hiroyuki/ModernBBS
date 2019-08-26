@extends('layouts.default')
@section('title', 'スレッド表示')
@section('content')
	<div class="col-md-8 mx-auto">
		<h2>タイトル：{{ $thread->thread_title }}
			<small>投稿日：{{ date("Y年 m月 d日", strtotime($thread->created_at)) }}</small>
			
		</h2>
		<p>{{ link_to("/profile/{$thread->user->id}", '投稿者：{ $thread->user->name }', array('class => 'btn btn-primary')) }}</p>
		<p>カテゴリー：{{ $thread->category->name }}</p>
		<p>{{ $thread->body }}</p>
		
		<hr />
		
		<h3>コメント一覧</h3>
			@foreach($thread->comment as $thread_comment)
				<p>コメントユーザー：{{ $thread_comment->user_id->name }}</p>
				<p>{{ $thread_comment->comment_text }}</p>
				
						@if($Good)
							{{ Form::model($comment, array('action' => array('GoodController@destroy', $comment->id, $good->id))) }}
								<button type="submit">
									Good!{{ $comment->good_count }}
								</button>
							{{!! Form::close() !!}
						@else
							{{ Form::model($comment, array('action' => array(GoodController@store', $comment->id))) }}
								<button type="submit">
									Good!{{ $comment->good_count }}
								</button>
							{!! Form::close() !!}
						@endif
						
				<p>{{ link_to("/comment/{comment->id}", 'レスポンスを読む', array('class' => 'btn btn-primary')) }}</p><br />
			@endforeach
			
		{{ Form::open([''route' => 'bbs.store'], array('class' => 'form')) }}
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
		
			<div class="form-group">
				<label for="comment" class="">コメント</label>
				<div class="">
						{{ Form::textarea('comment_text', null, array('class => '')) }}
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">コメントを送信する</button>
			</div>
			
		{{ Form::close() }}
		
	</div>
	
@endsection