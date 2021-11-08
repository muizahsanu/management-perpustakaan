@extends('layouts.main')

@section('container')
<div class="bookpage">
    <div class="bookpage__header">
        <h2 class="bookpage__title">Book list</h2>
        <a href="/admin/book/add-book" class="btn c-accent ml-auto"><i class='bx bx-plus' ></i></a>
        <input type="submit" value="Delete" class="btn" form="form-book-delete">
        
    </div>
    @error('id_buku')
    <div class="error-message">{{ $message }}</div>
    @enderror
    <table class="table">
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <form action="/book/delete" method="POST" id="form-book-delete">
        @csrf
        @foreach ($books as $book)
        <tr>
            <td><input type="checkbox" name="id_buku[]" value="{{ $book->id }}"></td>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->price }}</td>
            <td><a href="/book/{{ $book->uniqid }}/edit" class="btn blue"><i class='bx bxs-edit'></i></a></td>
        </tr>
        @endforeach
        </form>
    </table>
    {{ $books->links('vendor.pagination.default') }}
</div>
@endsection