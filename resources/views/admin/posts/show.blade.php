@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post["created_at"]}}</div>

                    <div class="card-body">
                        <h1>{{ $post["title"] }}</h1>
                        <p>{{ $post["content"] }}</p>
                        <img src="{{ asset( "storage/" . $post["post_cover"])}}" alt="{{ $post["title"] }}">
                        <p>{{ $category["title"] ?? ""}}</p>
                        <p>@if($post["tags"] && count($post["tags"]) > 0)
                            @foreach ($post["tags"] as $tag)
                            <span class="badge badge-primary">{{$tag["name"]}}</span>
                            @endforeach
                          @else
                            <span>No tags</span>
                          @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
