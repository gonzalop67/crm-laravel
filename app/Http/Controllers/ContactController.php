<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $client->contacts()->create($request->all());

        return back()->with('success', 'Contacto insertado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client, Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client, Contact $contact)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        $contact->update($request->all());
        return back()->with('success', 'Contacto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contacto eliminado exitosamente.');
    }
}
