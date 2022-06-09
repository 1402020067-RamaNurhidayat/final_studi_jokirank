<?php

namespace App\Http\Controllers;

use App\Models\JenisRank;
use Illuminate\Http\Request;

class ServiceRankController extends Controller
{
    public function index()
    {
        return view('service.index')->with([
            'type' => 'rank',
            'items' => JenisRank::all(),
            'name' => 'Rank',
        ]);
    }


    public function edit(JenisRank $rank)
    {
        return view('service.edit')->with([
            'type' => 'rank',
            'item' => $rank,
            'name' => 'Rank',
        ]);
    }

    public function create()
    {
        return view('service.create')->with([
            'type' => 'rank',
            'name' => 'Rank',
        ]);
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $rank = JenisRank::create($request->all());

        return redirect()->route('service.rank.index');
    }

    public function update(Request $request, JenisRank $rank)
    {
        $field = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string|max:255',
        ]);
        $rank->update($field);

        return redirect()->route('service.rank.index');
    }

    public function destroy(JenisRank $rank)
    {
        $rank->delete();

        return redirect()->route('service.rank.index');
    }

}
