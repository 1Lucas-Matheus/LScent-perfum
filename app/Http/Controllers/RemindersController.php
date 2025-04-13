<?php

namespace App\Http\Controllers;

use App\Models\Reminders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RemindersController extends Controller
{

    public readonly Reminders $reminders;
    public function __construct()
    {
        $this->reminders = new Reminders();
    }

    public function index()
    {
        $reminders = $this->reminders->all();
        return view('reminders.reminders', [
            'reminders' => $reminders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reminders.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->reminder) || empty($request->date)) {
            return redirect()->route('reminders.create')->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $request->validate([
            'reminder' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date_format:d/m/Y'],
        ]);

        $create = $this->reminders->create([
            'reminder' => $request->reminder,
            'date' => $request->date
        ]);

        if ($create) {
            return redirect()->route('reminders.index')->with('messageSuccess', 'Lembrete criada com êxito.');
        } else {
            return redirect()->route('reminders.index')->with('messageError', 'Falha ao criar lembrete');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reminders = $this->reminders->find($id);

        return view('reminders.partials.edit', [
            'reminder' => $reminders
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->reminder) || empty($request->date)) {
            return redirect()->route('reminders.edit', ['reminder' => $id])->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $dateConvert = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');

        $request->merge(['date' => $dateConvert]);

        $update = $this->reminders->where('id', $id)->update($request->except(['_token', '_method']));

        if ($update) {
            return redirect()->route('reminders.index')->with('messageSuccess', 'O produto foi atualizada com êxito.');
        } else {
            return redirect()->route('reminders.index')->with('messageError', 'Não foi possivel atualizar a produto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = $this->reminders->destroy($id);

        if ($destroy) {
            return redirect()->route('reminders.index')->with('messageSuccess', 'Produto excluído com êxito.');
        } else {
            return redirect()->route('reminders.index')->with('messageError', 'Não foi possivel exluir o produto.');
        }
    }
}
