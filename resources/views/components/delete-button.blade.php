<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    @props(['url'])

<form action="{{ $url }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet outil?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-500 text-white text-xs rounded hover:text-red-700 transition">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        Supprimer
    </button>
</form>
</div>
