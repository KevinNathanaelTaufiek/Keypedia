@extends('layouts.app')

@section('content')
<div class="box-form margin-bot">
    <div class="box-form-header center">
        <h5>Chang Password</h5>
    </div>
    <div class="box-form-content center-flex">
        <form action="/setting/password/update" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <label for="oldPassword">Your Password</label>
            <input class="margin-left @error('oldPassword') err-box @enderror" type="password" name="oldPassword"
                    value="{{ old('oldPassword') }}" id="oldPassword">
            @error('oldPassword') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>
            <label for="password">New Password</label>
            <input class="margin-left @error('password') err-box @enderror" type="password" name="password"
            value="{{ old('password') }}" id="password">
            @error('password') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>
            <label for="password_confirmation">Confirm Password</label>
            <input class="margin-left @error('password_confirmation') err-box @enderror" type="password" name="password_confirmation"
            value="{{ old('password_confirmation') }}" id="password_confirmation">
            @error('password_confirmation') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>

            <div class="center-flex margin-all">
                <button class="button-style" type="submit">Update Password</button>
            </div>


        </form>
    </div>
</div>

@endsection
