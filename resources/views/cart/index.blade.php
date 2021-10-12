@extends('layouts.app')

@section('content')
<h1 class="center">My Cart</h1>
<hr>
<div class="box-form margin-bot">
    <div class="box-form-header center">
    @if (!isset($carts->first()->keyboard_id))
    <div class="center">
        <h2>There are no items in your cart!</h2>

    </div>
    @else
        @foreach ($carts as $cart)

            <div class="box-form-content center-flex">
                <img class="margin-all" src="{{ asset('storage/'. $cart->keyboard->keyboardImage) }}" alt="keyboard-image" width="300px"
                height="200px">
                <div class="box-form">
                    <h5>{{ $cart->keyboard->keyboardName }}</h5>
                    <p>SubTotal: $ {{ $cart->keyboard->keyboardPrice * $cart->qty }}</p>

                    <form action="/cart/update/{{ $cart->id }}" method="post" class="center">
                        @csrf
                        @method('PATCH')
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="qty" value="{{ $cart->qty }}" class="@error('qty')
                                            err-box
                                            @enderror">
                        @error('qty')
                        <p class="err-msg">{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="keyboard_id" value="{{ $cart->keyboard->id }}">
                        <br>
                        <button type="submit" class="button-style">Update</button>
                    </form>

                </div>
            </div>
        @endforeach
        <div class="center margin-all">
            <form action="/checkout" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="button-style">Checkout</button>
            </form>
        </div>
    @endif
</div>

@endsection
