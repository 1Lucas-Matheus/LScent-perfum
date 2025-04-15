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
        if (empty($request->key) || empty($request->value)) {
            return redirect()->route('coupons.create')->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $request->validate([
            'key' => ['required', 'string', 'size:12'],
            'value' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        if ($this->coupons->where('key', $request->key)->exists()) {
            return redirect()->route('coupons.index')->with('messageError', 'Já existe um cupom com essa chave.');
        }

        if ($this->coupons->where('value', $request->value)->exists()) {
            return redirect()->route('coupons.index')->with('messageError', 'Já existe um cupom com esse valor.');
        }

        $create = $this->coupons->create([
            'key' => $request->key,
            'value' => $request->value
        ]);

        if ($create) {
            return redirect()->route('coupons.index')->with('messageSuccess', 'Cupom criada com êxito.');
        } else {
            return redirect()->route('coupons.index')->with('messageError', 'Falha ao criar cupom');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupom = $this->coupons->find($id);

        return view('coupons.partials.edit', [
            'coupom' => $coupom,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (empty($request->key) || empty($request->value)) {
            return redirect()->route('coupons.edit', ['coupom' => $id])->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $keyExists = $this->coupons->where('key', $request->key)->where('id', '!=', $id)->exists();
        $valueExists = $this->coupons->where('value', $request->value)->where('id', '!=', $id)->exists();

        if ($keyExists) {
            return redirect()->route('coupons.edit', ['coupom' => $id])->with('messageError', 'Já existe outro cupom com essa chave.');
        }

        if ($valueExists) {
            return redirect()->route('coupons.edit', ['coupom' => $id])->with('messageError', 'Já existe outro cupom com esse valor.');
        }

        $update = $this->coupons->where('id', $id)->update($request->except(['_token', '_method']));

        if ($update) {
            return redirect()->route('coupons.index')->with('messageSuccess', 'O cupom foi atualizada com êxito.');
        } else {
            return redirect()->route('coupons.index')->with('messageError', 'Não foi possivel atualizar a cupom.');
        }
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
