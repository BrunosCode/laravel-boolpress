@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category['id'] }}</th>
                        <td>{{ $category['title'] }}</a>
                        </td>
                        <td>{{ $category['slug'] }}</td>
                        <td>
                            <a href="{{ route("admin.categories.show", $category["id"]) }}">
                              <button type="button" class="btn btn-primary">Show</button>
                            </a>
                            <a href="{{ route("admin.categories.edit", $category["id"]) }}">
                              <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{ route("admin.categories.destroy", $category["id"])}}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection