<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public readonly Categories $categories;
    public function __construct()
    {
        $this->categories = new Categories();
    }


    public function index()
    {
        $categories = $this->categories->all();

        return view('category.category', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $categories = $this->categories->create([
            'name' => $request->name
        ]);

        if ($categories) 
        {
            return redirect()->route('categories.index')->with('messageSuccess', 'Categoria criada com êxito.');
        } else
        {
            return redirect()->route('categories.index')->with('messageError', 'Falha ao criar categoria');
        }
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
