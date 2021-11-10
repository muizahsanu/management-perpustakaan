@extends('layouts.main')

@section('container')
<div class="category">
    {{-- HEADER AND ACTION --}}
    <div class="category__header">
        <h2 class="category__title">Category list</h2>
        <a href="/category/add" class="btn c-accent ml-auto"><i class='bx bx-plus' ></i></a>
        <input type="submit" value="Delete" class="btn" form="form-category-delete">
    </div>

    {{-- SEARCH BAR --}}
    <div class="category__header">
        <form action="/category" class="header__searchbar">
            <div class="icon">
                <i class='bx bx-search'></i>
            </div>
            <input type="search" name="search" id="serach" placeholder="Search" value="{{ ($searchValue) ? $searchValue : '' }}">
        </form>
        @if ($searchValue)
        <a href="/category" class="btn" style="margin-left: 1rem">Clear search</a>
        @endif
        @error('category_id')
        <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    {{-- TABLE LIST CATEGORI --}}
    <table class="table">
        <tr>
            <th><input type="checkbox" id="checkbox-parent"></th>
            <th>ID</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
        <form action="/category/delete" method="POST" id="form-category-delete">
        @csrf
        @foreach ($categories as $category)
        <tr>
            <td><input type="checkbox" class="checkbox-child" name="category_id[]" value="{{ $category->id }}"></td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td><a href="/category/{{ $category->uniqid }}/edit" class="btn blue"><i class='bx bxs-edit'></i></a></td>
        </tr>
        @endforeach
        </form>
    </table>
    {{ $categories->links('vendor.pagination.default') }}
</div>
@endsection