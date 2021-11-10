<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        
        return view('category',[
            'searchValue'=> request('search'),
            'title'=> 'Categories',
            'categories'=> Category::latest()->paginate(10),
        ]);
    }

    public function addPage(){
        return view('add-category',[
            'title'=> 'Add Category',
        ]);
    }

    public function store(Request $req){
        $this->validate(
            $req,
            [
                'name.*'=> 'required'
            ],
            [
                'name.*.required'=> 'Please fill in all fields'
            ]
        );

        $newDatas = [];
        for($i = 0; $i < count($req->name); $i++){
            $newData = ['name'=> $req->name[$i],'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')];
            array_push($newDatas, $newData);
        }
        Category::insert($newDatas);
        return redirect('/category');
    }
}
