@extends('layouts.bbs')
@section('title', 'スレッド一覧')
@section('content')
	<div class="col-md-8 mx-auto">
		
		<div class="">
			<a href="{{ action('ThreadController@create') }}"><button type="button">新規情報投稿</button></a>
			<hr />
		</div>
		
		@foreach($category_threads as $category_thread)
			<div class="card-header">
				<h2>{{ $category_thread->thread_title }}</h2>
			</div>
			
			<div class="card-body">
				<p>{{ $category_thread->body }}</p>
				
				@if($category_thread->follows->where('user_id',$user_id)->isNotEmpty())
			  	<p>{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
			  	@elseif($category_thread->user_id == $user_id)
			  	<p>{{ link_to("/bbs/comment/comment/{$category_thread->id}", 'コメントを読む', array('class' => 'btn btn-primary')) }}</p>
			  	@else
			  	<p><a href="{{ action('FollowController@store', ['id' => $category_thread->user_id]) }}" role="button" class="btn btn-success">follow</a></p>
			  	@endif
			</div>
			
			<div class="card-hooter">
				<p><a href="{{ action('ProfileController@get_profile', ['id' => $category_thread->profile_id]) }}">
					投稿者：
					@if ($category_thread->user != null)
						{{ $category_thread->user->name }}
					@endif
				</a></p>
				<p>投稿日：{{ date("Y年 m月 d日",strtotime($category_thread->created_at)) }}</p>
			</div>
			
		@endforeach
	</div>
@endsection