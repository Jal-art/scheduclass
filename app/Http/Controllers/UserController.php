<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::with(['role', 'major', 'classLevel'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'rl_id' => 'required|exists:roles,rl_id',
            'major_id' => 'nullable|exists:majors,major_id',
            'class_level_id' => 'nullable|exists:class_levels,class_level_id',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        return User::create($data);
    }

    public function show($id)
    {
        return User::with(['role', 'major', 'classLevel'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return $user;
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
