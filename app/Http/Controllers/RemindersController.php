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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
