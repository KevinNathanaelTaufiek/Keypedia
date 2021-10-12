@extends('layouts.app')

@section('content')
<div class="box-form margin-bot">
    <div class="box-form-header center">
        <h5>Detail Keyboard</h5>
    </div>
    <div class="box-form-content center-flex">
        <img class="margin-all" src="{{ asset('storage/'. $keyboard->keyboardImage) }}" alt="keyboard-image"
            width="300px" height="200px">
        <div class="box-form">
            <h5>{{ $keyboard->keyboardName }}</h5>
            <p>$ {{ $keyboard->keyboardPrice }}</p>
            <p>{{ $keyboard->description }}</p>

            @guest
            @else
                @if (Auth::user()->role->roleName == 'Customer')
                    <form action="/cart/create" method="post" class="center">
                        @csrf
                        @method('POST')
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="qty" class="@error('qty')
                        err-box
                        @enderror">
                        @error('qty')
                            <p class="err-msg">{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="keyboard_id" value="{{ $keyboard->id }}">
                        <br>
                        <button type="submit" class="button-style">Add to Cart</button>
                    </form>
                @endif
            @endguest

        </div>
    </div>
</div>

@endsection
