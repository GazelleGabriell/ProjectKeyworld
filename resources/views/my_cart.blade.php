@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="">
            @if ($my_cart->first() != null)
                <div class="card bg-secondary">
                    <div class="card-header">My Cart</div>

                    <div class="card-body ">
                        @foreach ($my_cart as $item)
                        <div class="d-flex justify-content-center align-items-start">

                            <img class="m-5" src="{{ asset($item->keyboard->image) }}" width="350px"
                                alt="{{ $item->keyboard->name }}">
                            <div class="text-start m-5">
                                <h1>{{ $item->keyboard->name }}</h1>
                                <p>$ {{ $item->keyboard->price }}</p>


                                <form action="/cart/update/{{ $item->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity')
                                            }}</label>

                                        <div class="col-md-6">
                                            <input id="quantity" type="number"
                                                class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                                value="{{ $item->qty }}" autocomplete="quantity" autofocus>

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
                                                Update
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                        @endforeach
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-success " href="/checkout">
                                Checkout
                            </a>

                        </div>

                    </div>

                </div>

            @else
            <h1 class="alert alert-danger">There are no items here!</h1>
            @endif
        </div>

    </div>
</div>
@endsection
