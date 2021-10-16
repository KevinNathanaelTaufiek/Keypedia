@extends('layouts.app')

@section('content')
<h1 class="center">Manage Categories</h1>
<hr>
<div class="show-item-container">
    @foreach ($categories as $category)
    <div class="show-item">
        <a class="show-item" href="/view/{{ $category->id }}">
            <h6 class="center">{{ $category->categoryName }}</h6>
            <div class="center-flex">
                <img class="center" src="{{ asset('storage/'. $category->categoryImage) }}" alt="category-image" width="300px" height="200px">

            </div>
        </a>
        <div class="evenly-flex no-decor">
            <a class="button-style" href="/manage/category/edit/{{ $category->id }}">Update</a>
            <form action="/manage/category/delete/{{ $category->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="button-style bg-red margin-delete" type="submit">Delete</button>
            </form>

        </div>

    </div>
    @endforeach
</div>
@endsection
