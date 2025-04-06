<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de l\'Équipement IT & Computer') }} : {{ $itComputerEquipment->designation }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Désignation</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $itComputerEquipment->designation }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">N° d'Inventaire</h3>
                                <p class="mt-1 font-mono text-sm text-gray-600">{{ $itComputerEquipment->inventory_number }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Quantité</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $itComputerEquipment->quantity }}</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Statut</h3>
                                <div class="mt-1 space-x-2">
                                    <span class="@if($itComputerEquipment->available) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif px-2 py-1 rounded-full text-xs">
                                        Disponible: {{ $itComputerEquipment->available ? 'Oui' : 'Non' }}
                                    </span>
                                    <span class="@if($itComputerEquipment->on_loan) bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif px-2 py-1 rounded-full text-xs">
                                        Prêt: {{ $itComputerEquipment->on_loan ? 'Oui' : 'Non' }}
                                    </span>
                                    <span class="@if($itComputerEquipment->under_maintenance) bg-red-100 text-red-800 @else bg-gray-100 text-gray-800 @endif px-2 py-1 rounded-full text-xs">
                                        Maintenance: {{ $itComputerEquipment->under_maintenance ? 'Oui' : 'Non' }}
                                    </span>
                                </div>
                            </div>

                            @if($itComputerEquipment->material_reference)
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Référence Matériel</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $itComputerEquipment->material_reference }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <x-secondary-button onclick="window.history.back()">
                            Retour
                        </x-secondary-button>
                        <x-edit-button :url="route('it-computer-equipments.edit', $itComputerEquipment->id)" />
                        <x-delete-button :url="route('it-computer-equipments.destroy', $itComputerEquipment->id)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
