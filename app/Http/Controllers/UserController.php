<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Major;
use App\Models\ClassLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role','major','classLevel'])->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $majors = Major::all();
        $classLevels = ClassLevel::all();
        return view('users.create', compact('roles','majors','classLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usr_name' => 'required',
            'usr_email' => 'required|email|unique:users,usr_email',
            'usr_password' => 'required|min:6',
            'usr_role_id' => 'required',
        ]);

        User::create([
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
            'usr_password' => Hash::make($request->usr_password),
            'usr_role_id' => $request->usr_role_id,
            'usr_major_id' => $request->usr_major_id,
            'usr_class_level_id' => $request->usr_class_level_id,
        ]);

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $majors = Major::all();
        $classLevels = ClassLevel::all();
        return view('users.edit', compact('user','roles','majors','classLevels'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'usr_name' => 'required',
            'usr_email' => 'required|email|unique:users,usr_email,'.$user->usr_id.',usr_id',
            'usr_role_id' => 'required',
        ]);

        $data = [
            'usr_name' => $request->usr_name,
            'usr_email' => $request->usr_email,
            'usr_role_id' => $request->usr_role_id,
            'usr_major_id' => $request->usr_major_id,
            'usr_class_level_id' => $request->usr_class_level_id,
        ];

        if ($request->filled('usr_password')) {
            $data['usr_password'] = Hash::make($request->usr_password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully.');
    }
}
