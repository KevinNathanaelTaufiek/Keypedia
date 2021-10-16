@extends('layouts.app')

@section('content')
<h1 class="center">Your Transaction at {{ $transactionDetails->first()->transaction->transactionDate }}</h1>
<hr>

@php
    $total = 0;
@endphp

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
@endsection
