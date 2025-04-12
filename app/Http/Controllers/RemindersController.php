<?php

namespace App\Http\Controllers;

use App\Models\Reminders;
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
            return redirect()->route('reminders.index')->with('messageError', 'Preencha todos os campos obrigatórios.');
        }

        $request->validate([
            'reminder' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date_format:d/m/Y'],
        ]);

        $reminder = $this->reminders->create([
            'reminder' => $request->reminder,
            'date' => $request->date
        ]);

        if ($reminder) 
        {
            return redirect()->route('reminders.index')->with('messageSuccess', 'Lembrete criada com êxito.');
        } else
        {
            return redirect()->route('reminders.index')->with('messageError', 'Falha ao criar lembrete');
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
