@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
    <div class="text-center">
        <h1>Welcome to Keyworld</h1>
        <p>Best Keyboard and Keycaps Shop</p>

        <br>
        <h3>Categories</h3>
        <div class="d-flex justify-content-center flex-wrap row">
            @foreach ($categories as $category)
            <a href="/keyboard/category/{{ $category->id }}" class="text-decoration-none text-dark m-5">
                <div class="card p-3" style="width: 18rem;">
                    <img src="{{ asset($category->image) }}" class="card-img-top" height="150px" alt="{{ $category->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    </div>
</div>
@endsection
