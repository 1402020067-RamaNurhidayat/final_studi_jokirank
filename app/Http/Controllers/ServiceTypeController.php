<?php

namespace App\Http\Controllers;

use App\Models\JenisJoki;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        return view('service.index')->with([
            'type' => 'jenis',
            'items' => JenisJoki::all(),
            'name' => 'Jenis Joki',
        ]);
    }

    public function show(JenisJoki $jenis)
    {
        return view('service.show')->with([
            'type' => 'jenis',
            'item' => $jenis,
            'name' => 'Jenis',
        ]);
    }

    public function edit(JenisJoki $jenis)
    {
        return view('service.edit')->with([
            'type' => 'jenis',
            'item' => $jenis,
            'name' => 'Jenis',
        ]);
    }

    public function create()
    {
        return view('service.create')->with([
            'type' => 'jenis',
            'name' => 'Jenis',
        ]);
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'string|max:255',
            'price' => 'numeric',
        ]);

        $jenis = JenisJoki::create($request->all());

        return redirect()->route('service.jenis.index');
    }

    public function update(Request $request, JenisJoki $jenis)
    {
        $field = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string|max:255',
            'price' => 'numeric',
        ]);
        $jenis->update($field);

        return redirect()->route('service.jenis.index');
    }

    public function destroy(JenisJoki $jenis)
    {
        $jenis->delete();

        return redirect()->route('service.jenis.index');
    }

}
