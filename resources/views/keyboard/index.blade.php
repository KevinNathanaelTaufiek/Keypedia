@extends('layouts.app')

@section('content')
@if (isset($keyboards->first()->category->categoryName))
    <h1 class="center margin-all">{{ $keyboards->first()->category->categoryName }}</h1>
    <hr>
    <div class="show-item-container margin-bot">
        @foreach ($keyboards as $keyboard)
        <div class="show-item">
            <a class="show-item" href="/detail/{{ $keyboard->id }}">
                <div class="center-flex">
                    <img src="{{ asset('storage/'. $keyboard->keyboardImage) }}" alt="keyboard-image" width="300px" height="200px">

                </div>
                <h5 class="center">{{ $keyboard->keyboardName }}</h5>
                <h6 class="center"> $ {{ $keyboard->keyboardPrice }}</h6>
            </a>
            @guest

            @else
            @if (Auth::user()->role->roleName == 'Manager')
            <div class="evenly-flex no-decor">
                <a class="button-style" href="/edit/{{ $keyboard->id }}">Update</a>
                <form action="/delete/{{ $keyboard->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button-style bg-red" type="submit">Delete</button>
                </form>

            </div>
            @endif

            @endguest
        </div>
        @endforeach
    </div>

@else
    <h2 class="center margin-all">There are no keyboards for this category</h2>
    <hr>

@endif
@endsection
