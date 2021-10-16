@extends('layouts.app')

@section('content')
<div class="box-form margin-bot">
    <div class="box-form-header center">
        <h5>Change Password</h5>
    </div>
    <div class="box-form-content center-flex margin-box-right">
        <form action="/setting/password/update" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="oldPassword">Your Password</label>
                <input type="password" class="form-control length-control  @error('oldPassword') err-box @enderror" name="oldPassword" id="oldPassword" aria-describedby="emailHelp" 
                placeholder="Old Password"  value="{{ old('oldPassword') }}" >
                @error('oldPassword') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control length-control @error('password') err-box @enderror" name="password" id="password" aria-describedby="emailHelp" 
                placeholder="New Password"  value="{{ old('password') }}" >
                @error('password') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control length-control  @error('password_confirmation') err-box @enderror" name="password_confirmation" id="password_confirmation" aria-describedby="emailHelp" 
                placeholder="New Password"  value="{{ old('password_confirmation') }}" >
                @error('password_confirmation') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br>
            </div>
            {{-- <label for="password">New Password</label>
            <input class="margin-left @error('password') err-box @enderror" type="password" name="password"
            value="{{ old('password') }}" id="password">
            @error('password') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br> --}}
            {{-- <label for="password_confirmation">Confirm Password</label>
            <input class="margin-left @error('password_confirmation') err-box @enderror" type="password" name="password_confirmation"
            value="{{ old('password_confirmation') }}" id="password_confirmation">
            @error('password_confirmation') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                <br> --}}

            <div class="center-flex margin-all ">
                <button class="button-style" type="submit">Update Password</button>
            </div>


        </form>
    </div>
</div>

@endsection
