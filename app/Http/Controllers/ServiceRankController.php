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

    public function show(JenisRank $rank)
    {
        return view('service.show')->with([
            'type' => 'rank',
            'item' => $rank,
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
