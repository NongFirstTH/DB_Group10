<x-guest-layout>
    <div class="flex justify-center items-center h-screen bg-white">
        <div class="w-[480px] p-8 bg-white ">
            <h1 class="text-center text-4xl font-normal font-['Ubuntu Mono'] mb-6">REGISTER</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <x-input-label for="username" :value="__('Username')" class="text-lg" />
                    <x-text-input id="username" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" :value="old('username', auth()->user()->username)" type="text" name="username" :value="old('username')" required autofocus />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-lg" />
                    <x-text-input id="email" class="block w-full px-4 py-2 border rounded-md focus:ring focus:ring-gray-300" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-lg" />
                    <x-text-input id="password" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg" />
                    <x-text-input id="password_confirmation" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

<<<<<<< HEAD
                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-lg" />
                    <x-text-input id="email" class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
=======
                
>>>>>>> origin/Auth

                

                <!-- Submit Button -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('login') }}" class="text-lg underline text-gray-700 hover:text-gray-900">
                        {{ __('Back') }}
                    </a>
                    <x-primary-button class="bg-gray-700 text-white px-6 py-3 rounded-md hover:bg-gray-800">
                        {{ __('Submit') }}
                    </x-primary-button>


                    
                </div>

                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
