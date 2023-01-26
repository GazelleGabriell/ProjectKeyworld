@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="">
            <div class="card bg-secondary">
                <div class="card-header">Detail keyboard</div>

                <div class="card-body  d-flex justify-content-center align-items-start">
                    <img src="{{ asset($keyboard->image) }}" width="350px"
                        alt="{{ $keyboard->name }}">
                    <div class="text-start ml-3">
                        <h1>{{ $keyboard->name }}</h1>
                        <p>$ {{ $keyboard->price }}</p>
                        <p>{{ $keyboard->description }}</p>

                        @if(!Auth::check() || Auth::user()->role->name == "Customer")

                            <form action="/cart/add" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    <input type="hidden" name="keyboard_id" value="{{ $keyboard->id }}">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                    <div class="col-md-6">
                                        <input id="quantity" type="number"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            name="quantity" value="{{ old('quantity') }}"
                                            autocomplete="quantity" autofocus>

                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>

                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
