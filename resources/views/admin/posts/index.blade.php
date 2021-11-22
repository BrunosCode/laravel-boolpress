@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post['id'] }}</td>
                                            <td>{{ $post['title'] }}</td>
                                            <td>{{ $post['slug'] }}</td>
                                            <td>{{ $post['category']['title'] ?? 'No category' }}</td>
                                            <td>
                                                @if ($post['tags'] && count($post['tags']) > 0)
                                                    @foreach ($post['tags'] as $tag)
                                                        <span class="badge badge-primary">{{ $tag['name'] }}</span>
                                                    @endforeach
                                                @else
                                                    <span>No tags</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.posts.show', $post['id']) }}">
                                                    <button type="button" class="btn btn-primary">Show</button>
                                                </a>
                                                <a href="{{ route('admin.posts.edit', $post['id']) }}">
                                                    <button type="button" class="btn btn-warning">Edit</button>
                                                </a>
                                                <form action="{{ route('admin.posts.destroy', $post['id']) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
