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
                        <div class="form-group">
                            <td><label for="keyboardName">Keyboard Name</label></td>
                            <td><input type="text" class="form-control margin-left @error('keyboardName') err-box @enderror" 
                            name="keyboardName" id="keyboardName" aria-describedby="emailHelp" 
                            placeholder="Keyboard Name"  value="{{ old('keyboardName') }}" >
                            @error('keyboardName') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                            <br>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td><label for="keyboardPrice">Keyboard Price ($)</label></td>
                            <td><input type="number" class="form-control margin-left @error('keyboardPrice') err-box @enderror" 
                            name="keyboardPrice" min="0" id="keyboardPrice" aria-describedby="emailHelp" 
                            placeholder="Keyboard Price"  value="{{ old('keyboardPrice') }}" >
                            @error('keyboardPrice') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                            <br>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td><label for="description">Description</label></td>
                            <td><textarea type="number" class="form-control margin-left @error('description') err-box @enderror" 
                            name="description" min="0" id="description" aria-describedby="emailHelp" cols="30" rows="5">{{ old('description') }}</textarea>
                            @error('description') <p class="err-msg margin-left">{{ $message }}</p> @enderror
                            <br>
                            </td>
                        </div>
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
