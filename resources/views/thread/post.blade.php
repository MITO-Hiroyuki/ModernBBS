@extends('layouts.default')
@section('title', 'スレッド新規作成')
@section('content')
	<div class="col-md-8 mx-auto">
		<div="">
			<h2>スレッド新規作成</h2>
				
			@if(Session::has('message'))
				<div class="bg-info">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
			
			@foreach($errors->all() as $message)
				<p class="bg-danger">{{ $message }}</p>
			@endforeach
				
			{{ Form::open(['route' => 'thread.store'], array('class' => '')) }}
			
				<div class="form-group">
					<label for="thread_title" class="">タイトル</label>
					<div class="">
						{{ Form::text('thread_title', null, array('class' => '')) }}
					</div>
				</div>
					
				<div class="form-group">
					<label for="category_id" class="col-md-2">カテゴリー</label>
					<div class="">
						<select name="category_id" type="text" class="">
							<option></option>
							<option value="1" name="1">お知らせ</option>
							<option value="2" name="2">宿題</option>
							<option value="3" name="3">部活</option>
							<option value="4" name="4">生徒</option>
							<option value="5" name="5">友達</option>
						</select>
					</div>
				</div>
					
				<div class="form-group">
					<label for="body" class="">本文</label>
					<div class="">
						{{ Form::textarea('body', null, array('class' => '')) }}
					</div>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">スレッドを作成する</button>
				</div>
					
			{{ Form::close() }}
				
		</div>
	</div>
@endsection