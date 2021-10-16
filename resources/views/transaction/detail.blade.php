@extends('layouts.app')

@section('content')
<h1 class="center">Your Transaction at {{ $transactionDetails->first()->transaction->transactionDate }}</h1>
<hr>

@php
    $total = 0;
@endphp

<<<<<<< HEAD
<table border="1" class="margin-bot">
    <tr>
        <th>Keyboard Image</th>
        <th>Keyboard Name</th>
        <th>Subtotal</th>
        <th>Quantity</th>
    </tr>
    @foreach ($transactionDetails as $transactionDetail)
    <tr>
        <td><img class="margin-all" src="{{ asset('storage/'. $transactionDetail->keyboard->keyboardImage) }}" alt="keyboard-image" width="300px" height="200px"></td>
        <td><p>{{ $transactionDetail->keyboard->keyboardName }}</p></td>
        <td><p>{{ $transactionDetail->keyboard->keyboardPrice * $transactionDetail->qty }}</p></td>
        <td><p>{{ $transactionDetail->qty }}</p></td>
    </tr>
        @php
            $total += $transactionDetail->keyboard->keyboardPrice * $transactionDetail->qty;
        @endphp
    @endforeach
    <tr>
        <th></th>
        <th></th>
        <th>Total Price:</th>
        <th>${{ $total }}</th>
    </tr>
</table>
=======
<div class="container">
    <div class="col">
        <div class="col-11">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactionDetails as $transactionDetail)
                    <tr>
                        <td><img class="margin-all"
                                src="{{ asset('storage/'. $transactionDetail->keyboard->keyboardImage) }}"
                                alt="keyboard-image" width="200px" height="150px"></td>
                        <td>
                            <p>{{ $transactionDetail->keyboard->keyboardName }}</p>
                        </td>
                        <td>
                            <p>{{ $transactionDetail->keyboard->keyboardPrice * $transactionDetail->qty }}</p>
                        </td>
                        <td>
                            <p>{{ $transactionDetail->qty }}</p>
                        </td>
                    </tr>
                    @php
                    $total += $transactionDetail->keyboard->keyboardPrice * $transactionDetail->qty;
                    @endphp
                    @endforeach
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total Price:</th>
                        <th>${{ $total }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
>>>>>>> 73a6fbd6c72ddea56bfcceb7f08172e7161a9f6c
@endsection
