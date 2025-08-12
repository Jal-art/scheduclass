<?php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use Illuminate\Http\Request;

class ClassLevelController extends Controller
{
    public function index()
    {
        return ClassLevel::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:50'
        ]);

        return ClassLevel::create($request->all());
    }

    public function show($id)
    {
        return ClassLevel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $classLevel = ClassLevel::findOrFail($id);
        $classLevel->update($request->all());
        return $classLevel;
    }

    public function destroy($id)
    {
        return ClassLevel::destroy($id);
    }
}
