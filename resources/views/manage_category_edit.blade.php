@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center">
            <div class="card bg-secondary">
                <div class="card-header">
                    <h5>
                        Update Category

                    </h5>
                </div>

                <div class="card-body d-flex justify-content-center align-items-start">
                    <img src="{{ asset($selected_category->image) }}" width="350px" alt="{{ $selected_category->name }}">
                    <div>
                        <form action="/manage/category/update/{{ $selected_category->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name"
                                        value="{{ $selected_category->name }}" autocomplete="category_name" autofocus>

                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_image" class="col-md-4 col-form-label text-md-right">{{ __('Category Image') }}</label>

                                <div class="col-md-6">
                                    <input id="category_image" type="file" class="form-control-file @error('category_image') is-invalid @enderror" name="category_image" autocomplete="category_image" autofocus>

                                    @error('category_image')
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

