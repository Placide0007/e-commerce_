<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profil.profil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('profil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'between:3,10'],
            'first_name' => ['required', 'string', 'between:3,20'],
        ]);

        $user->update($request->only('name', 'first_name'));

        return redirect()->route('profils.index')->with('status', 'Informations mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() == $user->id) {
            Auth::logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerate();

        $user->delete();

        return redirect()->route('login')->with('status', 'compte supprimer avec succee');
    }
}
