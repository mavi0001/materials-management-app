<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceTool;
use Illuminate\Http\Request;

class MaintenanceToolController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $tools = MaintenanceTool::where('designation', 'LIKE', '%' . $query . '%')
                    ->orWhere('inventory_number', 'LIKE', '%' . $query . '%')
                    ->paginate(5);
        } else {
            $tools = MaintenanceTool::paginate(5);
        }

        return view('maintenance-tools.index', compact('tools'));
    }

    public function create()
    {
        return view('maintenance-tools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation'       => 'required',
            'inventory_number'  => 'required|unique:maintenance_tools',
            'quantity'          => 'required|integer|min:1',
            'material_reference'=> 'nullable|string',
        ]);

        $in_stock     = $request->has('in_stock');
        $on_loan      = $request->has('on_loan');
        $under_reform = $request->has('under_reform');

        MaintenanceTool::create([
            'designation'       => $validated['designation'],
            'inventory_number'  => $validated['inventory_number'],
            'quantity'          => $validated['quantity'],
            'material_reference'=> $validated['material_reference'] ?? null,
            'in_stock'          => $in_stock,
            'on_loan'           => $on_loan,
            'under_reform'      => $under_reform,
        ]);

        return redirect()->route('maintenance-tools.index')
            ->with('success', 'Outil enregistré avec succès!');
    }

    public function show(MaintenanceTool $maintenanceTool)
    {
        return view('maintenance-tools.show', compact('maintenanceTool'));
    }

    public function edit(MaintenanceTool $maintenanceTool)
    {
        return view('maintenance-tools.edit', compact('maintenanceTool'));
    }

    public function update(Request $request, MaintenanceTool $maintenanceTool)
    {
        $validated = $request->validate([
            'designation'      => 'required',
            'inventory_number' => 'required|unique:maintenance_tools,inventory_number,' . $maintenanceTool->id,
        ]);

        $in_stock     = $request->has('in_stock');
        $on_loan      = $request->has('on_loan');
        $under_reform = $request->has('under_reform');

        $maintenanceTool->update([
            'designation'       => $validated['designation'],
            'inventory_number'  => $validated['inventory_number'],
            'in_stock'          => $in_stock,
            'on_loan'           => $on_loan,
            'under_reform'      => $under_reform,
        ]);

        return redirect()->route('maintenance-tools.index')
            ->with('success', 'Outil modifié avec succès!');
    }

    public function destroy(MaintenanceTool $maintenanceTool)
    {
        $maintenanceTool->delete();

        return redirect()->route('maintenance-tools.index')
            ->with('success', 'Outil de maintenance supprimé avec succès.');
    }
}
