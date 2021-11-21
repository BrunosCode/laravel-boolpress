@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit your post</div>

                    <div class="card-body">
                        <form action="{{ route('admin.posts.update', $post['id']) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" placeholder="Insert Title"
                                    value="{{ old('title') ?? $post['title'] }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                    id="content" cols="30" rows="10"
                                    placeholder="Insert Content">{{ old('content') ?? $post['content'] }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">-- Select a category --</option>
                                    @foreach ($categories as $category)
                                    <option {{ old("category_id") == $category["id"] ? 'selected' : null }} value="{{$category["id"]}}">{{$category["title"]}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
