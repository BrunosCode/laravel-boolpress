@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <ul>
                        <li><a href="{{ route("admin.posts.index") }}">Post index</a></li>
                        <li><a href="{{ route("admin.posts.create") }}">New Post</a></li>
                        <li><a href="{{ route("admin.categories.index") }}">Categories index</a></li>
                        <li><a href="{{ route("admin.categories.create") }}">New categories</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
