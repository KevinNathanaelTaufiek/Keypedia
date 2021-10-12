@extends('layouts.app')

@section('content')
    <div class="box-form margin-bot">
        <div class="box-form-header center">
            <h5>Add Keyboard</h5>
        </div>
        <div class="box-form-content center-flex">
            <form action="/create" method="post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <table>
                    <tr>
                        <td><label for="category">Category</label></td>
                        <td ><select class="margin-left @error('category_id') err-box @enderror" name="category_id" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == old('category_id'))
                                        selected
                                    @endif>{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="keyboardName">Keyboard Name</label></td>
                        <td><input class="margin-left @error('keyboardName') err-box @enderror" type="text" name="keyboardName"
                            value="{{ old('keyboardName') }}" id="keyboardName">
                            @error('keyboardName') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="keyboardPrice">Keyboard Price ($)</label></td>
                        <td><input class="margin-left @error('keyboardPrice') err-box @enderror" type="number" name="keyboardPrice" min="0" id="keyboardPrice" value="{{ old('keyboardPrice') }}">
                            @error('keyboardPrice') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><textarea class="margin-left @error('description') err-box @enderror" name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
                            @error('description') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td><label for="keyboardImage">Keyboard Image</label></td>
                        <td><input class="margin-left @error('keyboardImage') err-box @enderror" type="file" name="keyboardImage" id="keyboardImage">
                            @error('keyboardImage') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                        </td>
                    </tr>
                </table>


                <div class="center-flex margin-all">
                    <button class="button-style" type="submit">Add</button>
                </div>


            </form>
        </div>
    </div>

@endsection
