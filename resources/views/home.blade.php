{{--
/*
*   Keypedia - Web Programming BU01
*   Kelompok F
*   2301907901 - Kevin Nathanael Taufiek
*   2301881820 - Rio Febrianto
*/ --}}

@extends('layouts.app')

@section('content')
<h1 class="center margin-all middle-h1">Welcome to Keypedia</h1>
<p class="center">Best Keyboard and Keycaps Shop</p>
<hr>
<h2 class="center">Categories</h2>
<div class="show-item-container margin-bot">
    @foreach ($categories as $category)
    <a class="show-item" href="/view/{{ $category->id }}">
        <h6 class="center">{{ $category->categoryName }}</h6>
        <img src="{{ asset('storage/'. $category->categoryImage) }}" alt="category-image" width="300px" height="200px">
    </a>
    @endforeach
</div>
@endsection
