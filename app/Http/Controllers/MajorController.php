<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return Major::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'major_name' => 'required|string|max:100'
        ]);

        return Major::create($request->all());
    }

    public function show($id)
    {
        return Major::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $major = Major::findOrFail($id);
        $major->update($request->all());
        return $major;
    }

    public function destroy($id)
    {
        return Major::destroy($id);
    }
}
