<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceTool;
use Illuminate\Http\Request;

class MaintenanceToolController extends Controller
{
    public function index()
    {
        $tools = MaintenanceTool::all();
        return view('maintenance-tools.index', compact('tools'));
    }

    public function create()
    {
        return view('maintenance-tools.create');
    }



    public function store(Request $request)
    {
    $validated = $request->validate([
        'designation' => 'required',
        'inventory_number' => 'required|unique:maintenance_tools',
    ]);
    MaintenanceTool::create($validated);

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
            'designation' => 'required',
            'inventory_number' => 'required|unique:maintenance_tools,inventory_number,'.$maintenanceTool->id,
        ]);

        $maintenanceTool->update($validated);

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
