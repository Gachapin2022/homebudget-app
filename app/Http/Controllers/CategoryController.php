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

    public function categoryEdit(string $id)
    {
        $category = Category::find($id);
        return view('Category.categoryEdit',compact('category'));
    }

    public function categoryUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $hasData = Category::where('id', '=', $request->id);
        if ($hasData->exists()) {
            $hasData->update([
                'name' => $request->name
            ]);
            session()->flash('flash_message', 'カテゴリを変更しました。');
        } else {
            session()->flash('flash_error_message', 'カテゴリを変更できませんでした。');
        }

        return redirect('/category');
    }
}
