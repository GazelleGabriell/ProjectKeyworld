@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="text-center">
            @if ($historys->first() != null)
            <div class="card bg-secondary">
                <div class="card-header"><h5>Transaction History</h5></div>

                <div class="card-body flex-column">
                    @foreach ($historys as $history)
                    <div class="mb-5">
                        <a class="alert alert-primary" href="/transaction/detail/{{ $history->id }}">
                            {{ $history->date }}
                        </a>
                    </div>
                    @endforeach

                </div>

            </div>

            @else
            <h1 class="alert alert-danger">There are no items here!</h1>
            @endif
        </div>

    </div>
</div>
@endsection
