@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="text-center">
            @php
                $total = 0;
            @endphp
            @if ($details->first() != null)
            <div class="card bg-secondary">
                <div class="card-header">
                    <h5>
                        Your transaction at {{ $details->first()->transaction->date }}
                    </h5>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-center align-items-start">

                        <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Keyboard Name</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                <tr>
                                    <th><img class="m-3" src="{{ asset($detail->keyboard->image) }}" width="150px"
                                        alt="{{ $detail->keyboard->name }}"></th>
                                    <td>{{ $detail->keyboard->name }}</td>
                                    @php
                                        $total += $detail->keyboard->price * $detail->qty;
                                    @endphp
                                    <td>{{ $detail->keyboard->price * $detail->qty }}</td>
                                    <td>{{ $detail->qty }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h4>
                                            Total Price: $ {{ $total }}
                                        </h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
