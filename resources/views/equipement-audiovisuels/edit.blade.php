<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'Équipement Audiovisuel') }} : {{ $equipementAudiovisuel->designation }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('equipement-audiovisuels.update', $equipementAudiovisuel->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Désignation -->
                            <div>
                                <x-input-label for="designation" :value="__('Désignation *')" />
                                <x-text-input id="designation" class="block mt-1 w-full" type="text"
                                    name="designation" value="{{ old('designation', $equipementAudiovisuel->designation) }}" required />
                            </div>

                            <!-- N° Inventaire -->
                            <div>
                                <x-input-label for="inventory_number" :value="__('N° d\'Inventaire *')" />
                                <x-text-input id="inventory_number" class="block mt-1 w-full" type="text"
                                    name="inventory_number" value="{{ old('inventory_number', $equipementAudiovisuel->inventory_number) }}" required />
                            </div>

                            <!-- Quantité -->
                            <div>
                                <x-input-label for="quantity" :value="__('Quantité *')" />
                                <x-text-input id="quantity" class="block mt-1 w-full" type="number"
                                    name="quantity" value="{{ old('quantity', $equipementAudiovisuel->quantity) }}" min="1" required />
                            </div>

                            <!-- Référence Matériel -->
                            <div>
                                <x-input-label for="material_reference" :value="__('Référence Matériel')" />
                                <x-text-input id="material_reference" class="block mt-1 w-full" type="text"
                                    name="material_reference" value="{{ old('material_reference', $equipementAudiovisuel->material_reference) }}" />
                            </div>

                            <!-- Checkboxes -->
                            <div class="space-y-4">
                                <!-- Disponible -->
                                <label class="flex items-center">
                                    <x-checkbox name="available" :checked="$equipementAudiovisuel->available" />
                                    <span class="ml-2 text-sm text-gray-600">Disponible</span>
                                </label>

                                <!-- En Prêt -->
                                <label class="flex items-center">
                                    <x-checkbox name="on_loan" :checked="$equipementAudiovisuel->on_loan" />
                                    <span class="ml-2 text-sm text-gray-600">En Prêt</span>
                                </label>

                                <!-- En Maintenance -->
                                <label class="flex items-center">
                                    <x-checkbox name="under_maintenance" :checked="$equipementAudiovisuel->under_maintenance" />
                                    <span class="ml-2 text-sm text-gray-600">En Maintenance</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button class="mr-4" onclick="window.history.back()">
                                Annuler
                            </x-secondary-button>
                            <x-primary-button>
                                Mettre à jour
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
