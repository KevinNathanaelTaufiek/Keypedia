@extends('layouts.app')

@section('content')
<div class="box-form margin-bot">
    <div class="box-form-header center">
        <h5>Detail Keyboard</h5>
    </div>
    <div class="box-form-content center-flex">
        <img class="margin-all-image" src="{{ asset('storage/'. $keyboard->keyboardImage) }}" alt="keyboard-image">
        <div class="box-form detail-key">
            <p>Keyboard Name : {{ $keyboard->keyboardName }}</p>
            <hr class="hr1">
            <p>Keyboard Price : ${{ $keyboard->keyboardPrice }}</p>
            <hr class="hr1">
            <p class="desc">Description : </p>
            <br>
            <p>{{ $keyboard->description }}</p>
            <hr class="hr1">

            @auth
                @if (Auth::user()->role->roleName != 'Manager')
                <form action="/cart/create" method="post" class="center">
                    @csrf
                    @method('POST')
                    <label for="quantity">Quantity : </label>
                    <input type="number" id="quantity" name="qty" class="form-control col-md-6 not-b @error('qty')
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

                @else
                <form action="/cart/create" method="post" class="center">
                    @csrf
                    @method('POST')
                    <label for="quantity">Quantity : </label>
                    <input type="number" id="quantity" name="qty" class="form-control col-md-6 not-b @error('qty')
                                                        err-box
                                                        @enderror">
                    @error('qty')
                    <p class="err-msg">{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="keyboard_id" value="{{ $keyboard->id }}">
                    <br>
                    <button type="submit" class="button-style">Add to Cart</button>
                </form>

            @endauth


        </div>
    </div>
</div>

@endsection
