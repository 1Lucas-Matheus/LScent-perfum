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

        $existingProduct = Products::where('name', $request->name)->first();

        if ($existingProduct) {
            return redirect()->route('products.create')->with('messageError', 'Já existe um produto com esse nome.');
        }

        $request->merge([
            'price' => str_replace(',', '.', $request->price),
        ]);

        if($request->price > 9999.99){
            return redirect()->route('products.create')->with('messageError', 'O preço não pode ser maior que 9999,99.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'between:0, 9999.99'],
            'promo' => ['nullable', 'numeric', 'between:0, 100'],
            'quantity' => ['required', 'integer'],
        ]);

        $create = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'promo' => $request->promo ?? 0,
        ]);

        if ($create) {
            return redirect()->route('products.index')->with('messageSuccess', 'Produto criado com êxito.');
        } else {
            return redirect()->route('products.index')->with('messageError', 'Não foi possível criar o produto.');
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

        $exists = Products::where('name', $request->name)->where('id', '!=', $id)->exists();

        if ($exists) {
            return redirect()->route('products.edit', ['product' => $id])->with('messageError', 'Já existe outro produto com esse nome.');
        }

        $request->merge([
            'price' => str_replace(',', '.', $request->price),
        ]);

        if($request->price > 9999.99){
            return redirect()->route('products.edit', ['product' => $id])->with('messageError', 'O preço não pode ser maior que 9999,99.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,4}(\.\d{1,2})?$/'],
            'promo' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'quantity' => ['required', 'integer'],
        ]);

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
