<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    public readonly Coupons $coupons;
    public function __construct()
    {
        $this->coupons = new Coupons();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = $this->coupons->all();

        return view('coupons.coupons', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupons.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => ['required', 'string', 'size:12'],
            'value' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        $coupons = $this->coupons->create([
            'key' => $request->key,
            'value' => $request->value
        ]);

        if ($coupons) 
        {
            return redirect()->route('coupons.index')->with('messageSuccess', 'Cupom criada com êxito.');
        } else
        {
            return redirect()->route('coupons.index')->with('messageError', 'Falha ao criar cupom');
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
        $destroy = $this->coupons->destroy($id);

        if ($destroy) {
            return redirect()->route('coupons.index')->with('messageSuccess', 'Cupom excluído com êxito.');
        } else {
            return redirect()->route('coupons.index')->with('messageError', 'Não foi possivel exluir a cupom.');
        }
    }
}
