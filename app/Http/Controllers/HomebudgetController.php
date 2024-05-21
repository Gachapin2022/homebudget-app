<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Homebudget;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomebudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return View('homebudget.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'category' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $result = Homebudget::create([
            'date' => $request->date,
            'category_id' => $request->category,
            'price' => $request->price,
            
        ]);

        if(!empty($result)){
            session()->flash('flash_message','支出の登録を行いました。');
        } else {
            session()->flash('flash_error_message','支出の登録ができませんでした。');
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
