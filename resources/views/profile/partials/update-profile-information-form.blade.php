<!-- <section class="bg-white p-6 rounded-lg shadow-md"> -->
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <!-- Username -->
    <div>
        <x-input-label for="username" :value="__('Username')" class="text-gray-900" />
        <x-text-input id="username" name="username" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('username', auth()->user()->username)" required autofocus autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('username')" />
    </div>

    <!-- Email -->
    <div>
        <x-input-label for="email" :value="__('Email')" class="text-gray-900" />

        <!-- Display Email as a Disabled Input -->
        <x-text-input
            id="email_display"
            name="email_display"
            type="email"
            class="mt-1 block w-full border border-gray-300 p-2 rounded-md bg-gray-100"
            :value="old('email', auth()->user()->email)"
            required
            autocomplete="username"
            disabled />

        <!-- Hidden Input to Send Email Value -->
        <input type="hidden" name="email" value="{{ old('email', auth()->user()->email) }}" />

        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>




    <!-- Firstname -->
    <div>
        <x-input-label for="firstname" :value="__('First Name')" class="text-gray-900" />
        <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('firstname', auth()->user()->firstname)" required autocomplete="firstname" />
        <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
    </div>

    <!-- Lastname -->
    <div>
        <x-input-label for="lastname" :value="__('Last Name')" class="text-gray-900" />
        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('lastname', auth()->user()->lastname)" required autocomplete="lastname" />
        <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
    </div>

    <!-- Phone Number -->
    <div>
        <x-input-label for="phone_number" :value="__('Phone Number')" class="text-gray-900" />
        <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('phone_number', auth()->user()->phone_number)" required autocomplete="phone_number" />
        <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
    </div>

    <!-- Location -->
    <div>
        <x-input-label for="location" :value="__('Location')" class="text-gray-900" />
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('location', auth()->user()->location)" required autocomplete="location" />
        <x-input-error class="mt-2" :messages="$errors->get('location')" />
    </div>

    <!-- Save and Manage Bio/Personality Button -->
    <div class="flex items-center gap-4 mt-6">
        <button class="text-white px-4 py-2 rounded-md bg-orange-500 hover:bg-[#FF8343]">
            {{ __('Save') }}
        </button>

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
<!-- </section> -->