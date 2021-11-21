@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit category</div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="titleHelp" placeholder="Insert category"
                                    value="{{ old('title') ?? $category['title'] }}">
                                @error('title')
                                    <p id="titleHelp" class="form-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
