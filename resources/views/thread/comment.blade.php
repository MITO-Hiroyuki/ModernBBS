@extends('layouts.default')
@section('title', 'スレッド表示')
@section('content')
	<div class="col-md-8 mx-auto">
		<h2>タイトル：{{ $thread->thread_title }}
			<small>投稿日：{{ date("Y年 m月 d日", strtotime($thread->created_at)) }}</small>
		</h2>
		<p>投稿者：{{ $thread->user->name }}</p>
		<p>カテゴリー：{{ $thread->category->name }}</p>
		<p>{{ $thread->body }}</p>
		
		{{ Form::open(['route' => 'bbs.store'], array('class' => 'form')) }}
			<div class="form-group row">
				<label for="per_thread_status" class="col-md-2">確認ステータス</label>
					<div class="col-md-10">
						<select name="per_thread_status" type="text" class="">
							<option></option>
							<option value="1" name="1">確認中</option>
							<option value="2" name="2">確認済</option>
							<option value="3" name="3">出来ました！</option>
							<option value="4" name="4">出来ません！</option>
							<optiin value="5" name="5">助けが必要です</optiin>
						</select>
					</div>
			</div>
		{{ Form::close() }}
		
		<hr />
		
		<h3>コメント一覧</h3>
			@foreach($thread->comment as $thread_comment)
				<p>コメントユーザー：{{ $thread_comment->user_id->name }}</p>
				<p>{{ $thread_comment->comment_text }}</p>
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