<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
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

        if (empty($request->name)) {
            return redirect()->route('products.index')->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $categories = $this->categories->create([
            'name' => $request->name
        ]);

        if ($categories) {
            return redirect()->route('categories.index')->with('messageSuccess', 'Categoria criada com êxito.');
        } else {
            return redirect()->route('categories.index')->with('messageError', 'Falha ao criar categoria');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categories->find($id);

        return view('category.partials.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (empty($request->name)) {
            return redirect()->route('categories.edit', ['category' => $id])->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $update = $this->categories->where('id', $id)->update($request->except(['_token', '_method']));

        if ($update) {
            return redirect()->route('categories.index')->with('messageSuccess', 'A categoria foi atualizada com êxito.');
        } else {
            return redirect()->route('categories.index')->with('messageError', 'Não foi possivel atualizar a categoria.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->categories->find($id);
    
        $Products = Products::where('category_id', $id)->exists();
    
        if ($Products) {
            return redirect()->route('categories.index')->with('messageError', 'Não é possível excluir essa categoria. Existem produtos associados a ela.');
        }
    
        $destroy = $category->delete();
    
        if ($destroy) {
            return redirect()->route('categories.index')->with('messageSuccess', 'Categoria excluída com êxito.');
        }
    
        return redirect()->route('categories.index')->with('messageError', 'Não foi possível excluir a categoria.');
    }
    
}
