<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
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
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function editPassword(User $user)
    {
        return view('users.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update(['password' => bcrypt($request->password)]);
        return redirect()->route('users.index')->with('success', 'Contraseña actualizada exitosamente.');
    }

    public function editPermissions(User $user)
    {
        $permissions = Permission::all();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('users.permissions', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Guarda los cambios de asignación de permisos.
     */
    public function updatePermissions(Request $request, User $user)
    {
        $permissionIds = $request->input('permissions', []);
        $user->permissions()->sync($permissionIds);

        return redirect()->route('users.permissions.edit', $user)
            ->with('success', 'Permisos actualizados correctamente.');
    }
}
