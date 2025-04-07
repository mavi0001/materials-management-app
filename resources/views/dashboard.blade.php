<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Administrateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Cartes de statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Outils de Maintenance -->
                <div class="bg-white shadow rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Icône pour Outils de Maintenance -->
                            <svg class="h-8 w-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm8-3a3 3 0 100 6 3 3 0 000-6z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-700">Outils de Maintenance</h3>
                            <p class="text-2xl text-gray-900">{{ $maintenanceToolsCount ?? 0 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Équipements Audiovisuels -->
                <div class="bg-white shadow rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Icône pour Équipements Audiovisuels -->
                            <svg class="h-8 w-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4h12v12H4z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-700">Équipements Audiovisuels</h3>
                            <p class="text-2xl text-gray-900">{{ $equipementaudiovisuel }}</p>
                        </div>
                    </div>
                </div>

                <!-- Équipements IT & Computer -->
                <div class="bg-white shadow rounded-lg p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Icône pour Équipements IT & Computer -->
                            <svg class="h-8 w-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-gray-700">Équipements IT & Computer</h3>
                            <p class="text-2xl text-gray-900">{{ $itEquipmentsCount ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message de bienvenue -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Bienvenue, Administrateur !</h3>
                    <p class="text-gray-600">Gérez vos ressources, consultez les activités récentes et suivez les statistiques clés de votre application.</p>
                </div>
            </div>

            <!-- Section Actions Rapides -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Actions Rapides</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="{{ route('maintenance-tools.index') }}" class="block bg-green-100 hover:bg-green-200 p-4 rounded-lg text-center text-green-800 font-medium">
                            Gérer les Outils de Maintenance
                        </a>
                        <a href="{{ route('equipement-audiovisuels.index') }}" class="block bg-blue-100 hover:bg-blue-200 p-4 rounded-lg text-center text-blue-800 font-medium">
                            Gérer les Équipements Audiovisuels
                        </a>
                        <a href="{{ route('it-computer-equipments.index') }}" class="block bg-red-100 hover:bg-red-200 p-4 rounded-lg text-center text-red-800 font-medium">
                            Gérer les Équipements IT & Computer
                        </a>
                    </div>
                </div>
            </div>



        </div>
    </div>
</x-app-layout>
