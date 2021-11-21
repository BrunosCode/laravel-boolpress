@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route("admin.categories.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp"
                    placeholder="Title" value="{{ old("title") }}">
                @error("title")
                    <small id="titleHelp" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route("admin.categories.index") }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
@endsection