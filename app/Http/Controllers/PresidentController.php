<?php

namespace App\Http\Controllers;

use App\Models\President;
use Illuminate\Http\Request;

class PresidentController extends Controller
{
    public function index()
    {
        $presidents = President::all();
        return view('presidents.index', compact('presidents'));
    }

    public function create()
    {
        return view('presidents.create');
    }

    public function store(Request $request)
    {
        President::create($request->all());
        return redirect()->route('presidents.index');
    }

    public function show(President $president)
    {
        return view('presidents.show', compact('president'));
    }

    public function edit(President $president)
    {
        return view('presidents.edit', compact('president'));
    }

    public function update(Request $request, President $president)
    {
        $president->update($request->all());
        return redirect()->route('presidents.index');
    }

    public function destroy(President $president)
    {
        $president->delete();
        return redirect()->route('presidents.index');
    }
}
