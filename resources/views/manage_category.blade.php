@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center">
            <h1>Manage Categories</h1>
            <div class="d-flex justify-content-center flex-wrap row">
                @foreach ($categories as $category)
                <a href="" class="text-decoration-none text-dark">
                    <div class="card m-5 p-3" style="width: 18rem;">
                        <img src="{{ asset($category->image) }}" class="card-img-top" height="150px"
                            alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <a href="/manage/category/edit/{{ $category->id }}" class="card-link btn btn-primary mx-1">Edit</a>
                            <form action="/manage/category/delete/{{ $category->id }}" method="POST" class="mx-1">
                                @csrf
                                @method('delete')
                                <button type="submit" class="card-link btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
