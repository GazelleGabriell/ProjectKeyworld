@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h5>
                        Update Keyboard

                    </h5>
                </div>

                <div class="card-body d-flex justify-content-center align-items-start">
                    <img src="{{ asset($selected_keyboard->image) }}" width="350px"
                        alt="{{ $selected_keyboard->name }}">
                    <div>
                        <form action="/keyboard/update/{{ $selected_keyboard->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category
                                    Id') }}</label>

                                <div class="col-md-6">

                                    <select class="form-select form-control form-select-sm @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        @foreach ($categories as $select)
                                        <option value="{{ $select->id }}" @if ($select->id == $selected_keyboard->category_id)
                                            selected
                                        @endif>{{ $select->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keyboard_name" class="col-md-4 col-form-label text-md-right">{{ __('Keyboard
                                    Name') }}</label>

                                <div class="col-md-6">
                                    <input id="keyboard_name" type="text" class="form-control @error('keyboard_name') is-invalid @enderror"
                                        name="keyboard_name" value="{{ $selected_keyboard->name }}" autocomplete="keyboard_name" autofocus>

                                    @error('keyboard_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keyboard_price" class="col-md-4 col-form-label text-md-right">{{ __('Keyboard
                                    Price ($)') }}</label>

                                <div class="col-md-6">
                                    <input id="keyboard_price" type="text" class="form-control @error('keyboard_price') is-invalid @enderror"
                                        name="keyboard_price" value="{{ $selected_keyboard->price }}" autocomplete="keyboard_price" autofocus>

                                    @error('keyboard_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keyboard_description" class="col-md-4 col-form-label text-md-right">{{ __('Keyboard
                                    Description') }}</label>

                                <div class="col-md-6">

                                    <textarea class="form-control @error('keyboard_description') is-invalid @enderror" name="keyboard_description"
                                        id="keyboard_description" style="height: 100px">{{ $selected_keyboard->description }}</textarea>

                                    @error('keyboard_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keyboard_image" class="col-md-4 col-form-label text-md-right">{{
                                    __('Keyboard Image') }}</label>

                                <div class="col-md-6">
                                    <input id="keyboard_image" type="file" class="form-control-file @error('keyboard_image') is-invalid @enderror"
                                        name="keyboard_image" autocomplete="keyboard_image" autofocus>

                                    @error('keyboard_image')
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
            </div>
        </div>

    </div>
</div>
@endsection
