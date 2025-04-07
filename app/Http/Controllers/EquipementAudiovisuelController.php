<?php

namespace App\Http\Controllers;

use App\Models\EquipementAudiovisuel;
use Illuminate\Http\Request;

class EquipementAudiovisuelController extends Controller
{
    public function index(Request $request)
    {
        $query = EquipementAudiovisuel::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('designation', 'like', '%' . $search . '%')
                ->orWhere('inventory_number', 'like', '%' . $search . '%');
        }

        $equipements = $query->paginate(5);

        return view('equipement-audiovisuels.index', compact('equipements'));
    }


    public function create()
    {
        return view('equipement-audiovisuels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation'      => 'required',
            'inventory_number' => 'required|unique:equipement_audiovisuels',
            'quantity'         => 'required|integer|min:1',
            'material_reference' => 'nullable|string',
        ]);

        $available         = $request->has('available');
        $on_loan           = $request->has('on_loan');
        $under_maintenance = $request->has('under_maintenance');

        EquipementAudiovisuel::create([
            'designation'      => $validated['designation'],
            'inventory_number' => $validated['inventory_number'],
            'quantity'         => $validated['quantity'],
            'material_reference' => $validated['material_reference'] ?? null,
            'available'        => $available,
            'on_loan'          => $on_loan,
            'under_maintenance'=> $under_maintenance,
        ]);

        return redirect()->route('equipement-audiovisuels.index')
            ->with('success', 'Équipement Audiovisuel enregistré avec succès!');
    }

    public function show(EquipementAudiovisuel $equipementAudiovisuel)
    {
        return view('equipement-audiovisuels.show', compact('equipementAudiovisuel'));
    }

    public function edit(EquipementAudiovisuel $equipementAudiovisuel)
    {
        return view('equipement-audiovisuels.edit', compact('equipementAudiovisuel'));
    }

    public function update(Request $request, EquipementAudiovisuel $equipementAudiovisuel)
    {
        $validated = $request->validate([
            'designation'      => 'required',
            'inventory_number' => 'required|unique:equipement_audiovisuels,inventory_number,'.$equipementAudiovisuel->id,
            'quantity'         => 'required|integer|min:1',
            'material_reference' => 'nullable|string',
        ]);

        $available         = $request->has('available');
        $on_loan           = $request->has('on_loan');
        $under_maintenance = $request->has('under_maintenance');

        $equipementAudiovisuel->update([
            'designation'      => $validated['designation'],
            'inventory_number' => $validated['inventory_number'],
            'quantity'         => $validated['quantity'],
            'material_reference' => $validated['material_reference'] ?? null,
            'available'        => $available,
            'on_loan'          => $on_loan,
            'under_maintenance'=> $under_maintenance,
        ]);

        return redirect()->route('equipement-audiovisuels.index')
            ->with('success', 'Équipement Audiovisuel modifié avec succès!');
    }

    public function destroy(EquipementAudiovisuel $equipementAudiovisuel)
    {
        $equipementAudiovisuel->delete();
        return redirect()->route('equipement-audiovisuels.index')
            ->with('success', 'Équipement Audiovisuel supprimé avec succès.');
    }
}
