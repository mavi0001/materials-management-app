<?php

namespace App\Http\Controllers;

use App\Models\ItComputerEquipment;
use Illuminate\Http\Request;

class ItComputerEquipmentController extends Controller
{
    public function index()
    {
        $equipments = ItComputerEquipment::paginate(5);
        return view('it-computer-equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('it-computer-equipments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation'      => 'required',
            'inventory_number' => 'required|unique:it_computer_equipments',
            'quantity'         => 'required|integer|min:1',
            'material_reference' => 'nullable|string',
        ]);

        $available         = $request->has('available');
        $on_loan           = $request->has('on_loan');
        $under_maintenance = $request->has('under_maintenance');

        ItComputerEquipment::create([
            'designation'      => $validated['designation'],
            'inventory_number' => $validated['inventory_number'],
            'quantity'         => $validated['quantity'],
            'material_reference' => $validated['material_reference'] ?? null,
            'available'        => $available,
            'on_loan'          => $on_loan,
            'under_maintenance'=> $under_maintenance,
        ]);

        return redirect()->route('it-computer-equipments.index')
            ->with('success', 'Équipement IT & Computer enregistré avec succès!');
    }

    public function show(ItComputerEquipment $itComputerEquipment)
    {
        return view('it-computer-equipments.show', compact('itComputerEquipment'));
    }

    public function edit(ItComputerEquipment $itComputerEquipment)
    {
        return view('it-computer-equipments.edit', compact('itComputerEquipment'));
    }

    public function update(Request $request, ItComputerEquipment $itComputerEquipment)
    {
        $validated = $request->validate([
            'designation'      => 'required',
            'inventory_number' => 'required|unique:it_computer_equipments,inventory_number,'.$itComputerEquipment->id,
            'quantity'         => 'required|integer|min:1',
            'material_reference' => 'nullable|string',
        ]);

        $available         = $request->has('available');
        $on_loan           = $request->has('on_loan');
        $under_maintenance = $request->has('under_maintenance');

        $itComputerEquipment->update([
            'designation'      => $validated['designation'],
            'inventory_number' => $validated['inventory_number'],
            'quantity'         => $validated['quantity'],
            'material_reference' => $validated['material_reference'] ?? null,
            'available'        => $available,
            'on_loan'          => $on_loan,
            'under_maintenance'=> $under_maintenance,
        ]);

        return redirect()->route('it-computer-equipments.index')
            ->with('success', 'Équipement IT & Computer modifié avec succès!');
    }

    public function destroy(ItComputerEquipment $itComputerEquipment)
    {
        $itComputerEquipment->delete();
        return redirect()->route('it-computer-equipments.index')
            ->with('success', 'Équipement IT & Computer supprimé avec succès.');
    }
}
