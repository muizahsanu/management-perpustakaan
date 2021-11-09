<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::with('category')->latest();

        if(request('search')){
            $books->where('title', 'like', '%' . request('search') .'%');
        }

        return view('book',[
            'title'=> 'Book',
            'searchValue'=> request('search'),
            'books'=> $books->paginate(10),
        ]);
    }

    public function addbookPage(){
        return view('add-book',[
            'title'=> 'Add Book',
            'searchValue'=> request('search'),
            'categories'=> Category::all(),
        ]);
    }

    public function store(Request $req){
        $this->validate(
            $req,
            [
                'title'=> 'required',
                'price'=> 'required|numeric|gt:0',
                'desc'=> 'required',
                'category_id'=> 'required',
            ],
            [
                'desc.required'=> 'The description field is required',
                'category_id.required' => 'Category must be selected.'
            ]
        );

        Book::create([
            'title' => $req->title,
            'uniqid' => uniqid(),
            'desc' => $req->desc,
            'price' => $req->price,
            'category_id' => $req->category_id,
        ]);
        
        return redirect('/book/add-book');
    }

    public function delete(Request $req){
        $this->validate(
            $req,
            [
                'id_buku' => 'required'
            ],
            [
                'id_buku.required' => 'Please select the book to be deleted.'
            ]
        );

        Book::destroy($req->id_buku);

        return redirect('/');
    }

    public function edit(Book $book){
        return view('update-book',[
            'title'=> 'Update Book',
            'searchValue'=> request('search'),
            'book'=> $book,
            'categories'=> Category::all(),
        ]);
    }

    public function update(Request $req, Book $book){
        $validatedData = $req->validate(
            [
                'title'=> 'required',
                'price'=> 'required|numeric|gt:0',
                'desc'=> 'required',
                'category_id'=> 'required',
            ],
        );
        Book::where('id', $book->id)->update($validatedData);
        return redirect('/');
        // return view('update-book',[
        //     'title'=> 'Update Book',
        //     'book'=> $book,
        //     'categories'=> Category::all(),
        // ]);
    }
}
