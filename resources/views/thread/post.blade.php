@extends('layouts.default')
@section('title', 'スレッド新規作成')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				
				<h2>スレッド新規作成</h2>
				
				@if(Session::has('message'))
					<div class="bg-info">
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif
				
				@if(count($errors) > 0)
					<ul>
						@foreach($errors->all() as $e)
							<li>{{ $e }}</li>
						@endforeach
					</ul>
				@endif
					
				{{ Form::open(['route' => 'bbs.store'], array('class' => 'form')) }}
					
					<div class="form-group row">
						<label for="title" class="col-md-2">タイトル</label>
						<div class="col-md-10">
							{{ Form::text('title', null, array('class' => '')) }}
						</div>
					</div>
					
					<div class="form-group row">
						<label for="category_id" class="col-md-2">カテゴリー</label>
						<div class="col-md-10">
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
					
					<div class="form-group row">
						<label for="content" class="col-md-2">本文</label>
						<div class="col-md-10">
							{{ Form::textarea('content', null, array('class' => '')) }}
						</div>
					</div>
					
					<div class="from-group">
						<input type="submit" class="btn btn-primary" value="投稿">
					</div>
					
				{{ Form::close() }}
				
			</div>
		</div>
	</div>
@endsection