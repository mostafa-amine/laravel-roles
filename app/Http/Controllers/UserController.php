<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (!(auth()->user()->roles()->first()->name == 'admin')) {
            abort(401, "Ma3ndkche l7a9");
        }
        return "Users";
    }

    public function create()
    {
        if (!(auth()->user()->roles()->first()->name == 'admin')) {
            abort(401, "Ma3ndkche l7a9");
        }

        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        if (!(auth()->user()->roles()->first()->name == 'admin')) {
            abort(401, "Ma3ndkche l7a9");
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->roles);

        return redirect()->route('home');
    }
}
