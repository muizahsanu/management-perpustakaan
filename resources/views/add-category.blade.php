@extends('layouts.main')

@section('container')
<div class="category">
    {{-- HEADER AND ACTION --}}
    <div class="category__header">
        <h2 class="category__title">Add new category</h2>
        <select class="ml-auto" name="moreCategory" id="moreCategory" form="formCategory">
            <option value="1" {!! (old('moreCategory') == '1')? 'selected' : '' !!}>1</option>
            <option value="2" {!! (old('moreCategory') == '2')? 'selected' : '' !!}>2</option>
            <option value="3" {!! (old('moreCategory') == '3')? 'selected' : '' !!}>3</option>
            <option value="4" {!! (old('moreCategory') == '4')? 'selected' : '' !!}>4</option>
            <option value="5" {!! (old('moreCategory') == '5')? 'selected' : '' !!}>5</option>
        </select>
    </div>
    <div class="category__body">
        <form action="/category/store" method="POST" id="formCategory" class="form" autocomplete="off">
            @csrf
            <div class="form-group from-group-input">
                <label for="category-name">Name</label>
                @if ($errors->has('name.*'))
                    @for ($i = 0; $i < (int)old('moreCategory') ; $i++)
                        <input type="text" name="name[]" class="form-input-category" id="category-name" placeholder="Category name.." value="{{ old('name.'.$i.'') }}" style="margin-top: 8px">
                        @error('name.'.$i.'')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    @endfor
                @else
                    <input type="text" name="name[]" class="form-input-category" id="category-name" placeholder="Category name.." style="margin-top: 8px">
                @endif
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn c-accent">
            </div>
        </form>
    </div>
</div>
@endsection