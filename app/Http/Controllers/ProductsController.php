<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public readonly Products $products;
    public function __construct()
    {
        $this->products = new Products();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->products->all();
        $categories = Categories::all();

        return view('products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        return view('products.partials.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->name) || empty($request->price) || empty($request->category_id) || empty($request->quantity)) {
            return redirect()->route('products.create')->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,6}(\.\d{1,2})?$/'],
            'promo' => ['nullable', 'numeric', 'between:1,100'],
            'quantity' => ['required', 'integer'],
        ]);

        $create = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'promo' => $request->promo ?? 0
        ]);

        if ($create) {
            return redirect()->route('products.index')->with('messageSuccess', 'Produto criada com êxito.');
        } else {
            return redirect()->route('products.index')->with('messageError', 'Não foi possivel criar o produto.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = $this->products->find($id);
        $categories = Categories::all();

        return view('products.partials.edit', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (empty($request->name) || empty($request->price) || empty($request->category_id) || empty($request->quantity)) {
            return redirect()->route('products.edit', ['product' => $id])->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $update = $this->products->where('id', $id)->update($request->except(['_token', '_method']));

        if ($update) {
            return redirect()->route('products.index')->with('messageSuccess', 'O produto foi atualizada com êxito.');
        } else {
            return redirect()->route('products.index')->with('messageError', 'Não foi possivel atualizar a produto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destroy = $this->products->destroy($id);

        if ($destroy) {
            return redirect()->route('products.index')->with('messageSuccess', 'Produto excluído com êxito.');
        } else {
            return redirect()->route('products.index')->with('messageError', 'Não foi possivel exluir o produto.');
        }
    }
}
