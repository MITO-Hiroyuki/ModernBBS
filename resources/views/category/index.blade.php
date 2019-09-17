@extends('layouts.bbs')
@section('title', 'ModernBBS')

@section('content')
	<div class="container mb-4">
		<div class="row">
			<div class="col-10">
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
			
			<div class="col-xs-3">
				<div class="card">
					<div class="card-header bg-primary text-white" style="text-align:center;">
						新スレッド一覧
					</div>
					@foreach($threads as $post)
						<ul class="list-group list-group-flush">
							<li class="list-group-item list-group-item-primary" style="text-align:center;">
								<div class="title_in_card">{{ $post->thread_title }}</div>
							</li>
							<a href="{{ action('ThreadController@show', ['id' => $post->id]) }}" class="list-group-item list-group-item-action" style="text-align:center;">
								投稿を見る
							</a>
						</ul>
					@endforeach
				</div>
				<div class="newthread pagination">
					{{ $threads->links() }}
				</div>
			</div>
			
		</div>
	</div>
@endsection