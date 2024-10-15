<section class="bg-white p-6 rounded-lg shadow-md">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" class="text-gray-900" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-900" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Firstname -->
        <div>
            <x-input-label for="firstname" :value="__('First Name')" class="text-gray-900" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('firstname', $user->firstname)" required autocomplete="firstname" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <!-- Lastname -->
        <div>
            <x-input-label for="lastname" :value="__('Last Name')" class="text-gray-900" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('lastname', $user->lastname)" required autocomplete="lastname" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" class="text-gray-900" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('phone_number', $user->phone_number)" required autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <!-- Location -->
        <div>
            <x-input-label for="location" :value="__('Location')" class="text-gray-900" />
            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md" :value="old('location', $user->location)" required autocomplete="location" />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 mt-6">
            <x-primary-button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
