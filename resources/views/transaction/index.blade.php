@extends('layouts.app')

@section('content')
<h1 class="center">Your Transaction History</h1>
<hr>
@if (!isset($transactions->first()->id))
<div class="box-form-header center">
    <div class="center">
        <h2>You haven't bought any item yet!</h2>
    </div>
</div>
@else
@foreach ($transactions as $transaction)
    <a class="no-decor" href="/transaction/detail/{{ $transaction->id }}">
        <p class="center bg-blue-light margin-mid">Transaction at {{ $transaction->transactionDate }}</p>
    </a>
@endforeach
@endif
@endsection
