@extends('layouts.app')

@section('content')
<h1 class="center">Your Transaction at {{ $transactionDetails->first()->transaction->transactionDate }}</h1>
<hr>

@php
    $total = 0;
@endphp

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
@endsection
