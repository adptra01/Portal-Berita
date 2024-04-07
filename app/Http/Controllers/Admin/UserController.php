<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $validate = $request->validated();
        $validate['password'] = bcrypt($request->name);

        User::create($validate);

        return redirect()->route('users.index')->with('success', 'Akun Pengguna ' . $request->name . ' berhasil dibuat!');
    }
    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);
        $validate = $request->validated();

        if ($request->filled('password')) {
            $validate['password'] = bcrypt($request->password);
        }

        $user->update($validate);

        return redirect()->route('users.index')->with('success', 'Akun Pengguna ' . $request->name . ' berhasil diedit!');
    }
}
