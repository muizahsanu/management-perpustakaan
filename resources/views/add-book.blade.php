@extends('layouts.main')

@section('container')
<div class="addbookpage">
    <div class="addbookpage__header">
        <h2 class="addbookpage__title">{{ $title }}</h2>
    </div>
    <div class="addbookpage__body">
        <form action="/book/store" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="booktitle">Title</label>
                <input type="text" name="title" id="booktitle" value="{{ old('title') }}">
                @error('title')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bookprice">Price</label>
                <input type="number" name="price" id="bookprice" min="0" value="{{ (old('price')) ? old('price') : 0 }}">
                @error('price')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bookdesc">Description</label>
                <textarea name="desc" id="bookdesc" cols="30" rows="10">{{ old('desc') }}</textarea>
                @error('desc')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bookcategory">Category</label>
                <div class="selector" id="selector-catagory">
                    <input type="search" name='category_name' placeholder="Select category">
                    @error('category_id')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name='category_id'>
                    <div class="selector__content">
                        {{-- data added in javascript selector.js --}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn c-accent">
            </div>
        </form>
    </div>
</div>

<script>
    var selectorData = [@json($categories)];
</script>
@endsection