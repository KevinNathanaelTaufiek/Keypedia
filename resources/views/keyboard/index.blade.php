@extends('layouts.app')

@section('content')
@if (isset($keyboards->first()->category->categoryName))
    <h1 class="center margin-all middle-h1">{{ $keyboards->first()->category->categoryName }}</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <form>
                <div class="input-group mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Here" name="search" >
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                        <select name="field" class="form-control margin-left col-md-2" aria-label="Default select example">
                            <option value="name">name</option>
                            <option value="price">price</option>
                        </select>
                    </div>
                </div>
            </form>
            
        </div>
    </div>      
    <div class="show-item-container margin-bot">
        @foreach ($keyboards as $keyboard)
        <div class="show-item">
            <a class="show-item" href="/detail/{{ $keyboard->id }}">
                <div class="center-flex">
                    <img src="{{ asset('storage/'. $keyboard->keyboardImage) }}" alt="keyboard-image">

                </div>
                <h5 class="theLeft">{{ $keyboard->keyboardName }}</h5>
                <hr class="hr1">
                <h6 class="theLeft"> $ {{ $keyboard->keyboardPrice }}</h6>
            </a>
            @guest

            @else
            @if (Auth::user()->role->roleName == 'Manager')
            <div class="evenly-flex no-decor">
                <a class="button-style" href="/edit/{{ $keyboard->id }}">Update</a>
                <form action="/delete/{{ $keyboard->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button-style bg-red margin-delete" type="submit">Delete</button>
                </form>

            </div>
            @endif

            @endguest
        </div>
        @endforeach
        
    </div>
    <br>
    {{$keyboards->links()}}
@else
    <h2 class="center margin-all">There are no keyboards for this category</h2>
    <hr>

@endif

@endsection
