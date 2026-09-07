<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(14);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:admin,customer'],
        ]);

        $user = new User();

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password']);
        $user->role = $fields['role'];

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'role' => ['required', 'in:admin,customer'],
        ]);

        $user = User::findOrFail($id);

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->role = $fields['role'];

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}