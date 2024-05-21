<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showIndex()
    {
        return view('Category.categoryCreate');
    }

    public function registrar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $result = Category::create([
            'name' => $request->name
        ]);

        if(!empty($result)){
            session()->flash('flash_message','カテゴリの登録を行いました。');
        } else {
            session()->flash('flash_error_message','カテゴリの登録ができませんでした。');
        }

        return redirect('/category');
    }
}
