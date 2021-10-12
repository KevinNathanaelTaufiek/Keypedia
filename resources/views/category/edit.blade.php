@extends('layouts.app')

@section('content')
<div class="box-form">
    <div class="box-form-header center">
        <h5>Update category</h5>
    </div>
    <div class="box-form-content center-flex">
        <img class="margin-all" src="{{ asset('storage/'. $category->categoryImage) }}" alt="category-image"
            width="300px" height="200px">
        <form action="/manage/category/update/{{ $category->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <table>
                <tr>
                    <td><label for="categoryName">Category Name</label></td>
                    <td><input class="margin-left @error('categoryName') err-box @enderror" type="text"
                            name="categoryName"
                            value="@if (old('categoryName')){{ old('categoryName') }}@else{{ $category->categoryName }}@endif"
                            id="categoryName">
                        @error('categoryName') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="categoryImage">Category Image</label></td>
                    <td><input class="margin-left @error('categoryImage') err-box @enderror" type="file"
                            name="categoryImage" id="categoryImage">
                        @error('categoryImage') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                    </td>
                </tr>
            </table>


            <div class="center-flex margin-all">
                <button class="button-style" type="submit">Update</button>
            </div>


        </form>
    </div>
</div>

@endsection
