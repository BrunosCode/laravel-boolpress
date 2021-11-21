@extends('layouts.app')

@section('content')
	<div class="col-md-8 blog-main">
		<h1 class="blog-post-title">{{$post['title']}}</h1>
		<p class="blog-post-meta">{{$post->created_at->diffForHumans()}} <a href="#">Jacob</a></p>
		@if($post['tags'])
			<p>
				@foreach ($post["tags"] as $tag)
					<span class="badge badge-primary">{{$tag["name"]}}</span>
				@endforeach
			</p>
		@endif

		@if ($post["category"])
			<h4>
				Categoria: <a href="{{route("categories.show", $post["category"]["slug"])}}">{{$post["category"]["name"]}}</a>
			</h4>
		@endif
		<p>
			{{$post['content']}}
		</p>
	</div><!-- /.blog-main -->
@endsection