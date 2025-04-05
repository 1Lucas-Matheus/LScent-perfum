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
        $create = Products::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'quantity' => $request->input('quantity'),
            'promo' => $request->input('promo') ?? 0
        ]);

        if($create)
        {
            return redirect()->route('products.index')->with(['messageSuccess', 'Produto criada com êxito.']);
        } else
        {
            return redirect()->route('products.index')->with(['messageError', 'Não foi possivel criar o produto.']);
        }
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
