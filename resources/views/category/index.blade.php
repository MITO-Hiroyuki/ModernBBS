@extends('layouts.bbs')
@section('title', 'ModernBBS')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="row">
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category1->category_id) }}" class="card card1 text-white" >
							<h1 class="card-body">
							{{ $category1->name }}</h1>
						</a>
					</div>
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category2->category_id) }}" class="card card2 text-white" >
							<h1 class="card-body">
							{{ $category2->name }}</h1>
						</a>
					</div>
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category3->category_id) }}" class="card card3 text-white" >
							<h1 class="card-body">
							{{ $category3->name }}</h1>
						</a>
					</div>
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category4->category_id) }}" class="card card4 text-white" >
							<h1 class="card-body">
							{{ $category4->name }}</h1>
						</a>
					</div>
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category5->category_id) }}" class="card card5 text-white" >
							<h1 class="card-body">
							{{ $category5->name }}</h1>
						</a>
					</div>
					<div class="card-panel">
						<a href="{{ action('ThreadController@showThread', $category6->category_id) }}" class="card card6 text-white" >
							<h1 class="card-body">
							{{ $category6->name }}</h1>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="row">
				<p>新着スレッド一覧</p>
					<div class="card newthread">
						<div class="list-group">
							@foreach($threads as $post)
								<h4 class="list-group-item-heading">{{ $post->thread_title }}</h4>
								<p class="list-group-item-text">{{ $post->category->name }}</p>
								<span>{{ link_to("/bbs/comment/comment/{$post->id}", '閲覧する', array('class' => 'btn btn-primary')) }}</span>
							@endforeach
						</div>
						<div class="newthread-pagination pagination-sm">
							{{ $threads->links() }}
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
@endsection