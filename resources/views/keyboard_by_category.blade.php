@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center">
            @if ($keyboards->first() != null)
            <h1>{{ $keyboards->first()->category->name }}</h1>
            <form action="/keyboard/category/search/{{ $keyboards->first()->category->id }}" method="post" >
                @csrf
                @method('put')
                <div class="input-group d-flex justify-content-center">
                    <div class="row">
                        <div class="col">
                            <input type="search" class="form-control rounded" name="search" placeholder="Search" />
                        </div>
                        <select class="form-select form-control col-3 mx-1 rounded bg-secondary text-light @error('search_by') is-invalid @enderror" name="search_by">
                            <option value="name" selected>Name</option>
                            <option value="price">Price</option>
                        </select>
                        <button type="submit" class="btn btn-primary">search</button>

                    </div>
                </div>
            </form>
                <div class="d-flex justify-content-center flex-wrap row">
                    @foreach ($keyboards as $keyboard)
                    <a href="/keyboard/detail/{{ $keyboard->id }}" class="text-decoration-none text-dark">
                        <div class="card m-5 p-3 border border-primary " style="width: 18rem;">
                            <img src="{{ asset($keyboard->image) }}" class="card-img-top" height="150px"
                                alt="{{ $keyboard->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $keyboard->name }}</h5>
                                <p class="card-text">$ {{ $keyboard->price }}</p>
                            </div>
                            @auth
                                @if (Auth::user()->role->name == "Manager")
                                    <div class="card-body d-flex justify-content-center">
                                        <a href="/manage/keyboard/edit/{{ $keyboard->id }}"
                                            class="card-link btn btn-primary mx-1">Edit</a>
                                        <form action="/manage/keyboard/delete/{{ $keyboard->id }}" method="POST" class="mx-1">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="card-link btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="pagination d-flex justify-content-center">
                    {{ $keyboards->links('pagination::bootstrap-4') }}

                </div>

            @else
            <h1 class="alert alert-danger">There are no items here!</h1>
            @endif
        </div>

    </div>
</div>
@endsection
