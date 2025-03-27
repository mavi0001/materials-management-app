<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier l\'Outil') }} : {{ $maintenanceTool->designation }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('maintenance-tools.update', $maintenanceTool->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Same form fields as create.blade.php but with values -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Désignation -->
                            <div>
                                <x-input-label for="designation" :value="__('Désignation *')" />
                                <x-text-input id="designation" class="block mt-1 w-full" type="text"
                                    name="designation" value="{{ old('designation', $maintenanceTool->designation) }}" required />
                            </div>

                            <!-- N° Inventaire -->
                            <div>
                                <x-input-label for="inventory_number" :value="__('N° d\'Inventaire *')" />
                                <x-text-input id="inventory_number" class="block mt-1 w-full" type="text"
                                    name="inventory_number" value="{{ old('inventory_number', $maintenanceTool->inventory_number) }}" required />
                            </div>


                            <!-- Checkboxes -->
                            <div class="space-y-4">
                                <!-- En Stock -->
                                <label class="flex items-center">
                                    <x-checkbox name="in_stock" :checked="$maintenanceTool->in_stock" />
                                    <span class="ml-2 text-sm text-gray-600">En Stock</span>
                                </label>

                                <!-- En Prêt -->
                                <label class="flex items-center">
                                    <x-checkbox name="on_loan" :checked="$maintenanceTool->on_loan" />
                                    <span class="ml-2 text-sm text-gray-600">En Prêt</span>
                                </label>

                                <!-- En Réforme -->
                                <label class="flex items-center">
                                    <x-checkbox name="under_reform" :checked="$maintenanceTool->under_reform" />
                                    <span class="ml-2 text-sm text-gray-600">En Réforme</span>
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
