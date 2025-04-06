<section class="bg-white ">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('Informations de profil') }}
        </h2>
        <p class="mt-2 text-sm text-gray-500">
            {{ __("Mettez à jour les informations de profil et l'adresse e-mail de votre compte.") }}
        </p>
    </header>

    <!-- Formulaire pour renvoyer l'email de vérification -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Formulaire de mise à jour du profil -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Champ Nom -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Champ Email -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __("Votre adresse e-mail n'est pas vérifiée.") }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __("Cliquez ici pour renvoyer l'e-mail de vérification.") }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __("Un nouveau lien de vérification a été envoyé à votre adresse e-mail.") }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Bouton Enregistrer et message de succès -->
        <div class="flex items-center justify-end space-x-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                {{ __('Enregistrer') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Enregistré.') }}
                </p>
            @endif
        </div>
    </form>
</section>
