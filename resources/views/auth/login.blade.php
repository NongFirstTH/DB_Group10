<x-guest-layout>

  <div class="flex flex-col items-center justify-center min-h-screen bg-white">

    <!-- Login Form -->
    <div class="w-full max-w-md mx-auto mt-10">
      <h2 class="text-4xl font-['Ubuntu Sans Mono'] text-center mb-8">LOGIN</h2>
      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
          <x-input-label for="email" :value="__('Email')" class="text-lg" />
          <input id="email" name="email" type="email"
            class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
            required>
        </div>

        <!-- Password -->
        <div>
          <x-input-label for="password" :value="__('Password')" class="text-lg" />
          <input id="password" name="password" type="password"
            class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
            required>
        </div>

        <!-- Login Button -->
        <div class="flex justify-center mt-6">
          <button type="submit" class="bg-gray-700 text-white px-6 py-3 rounded-md hover:bg-gray-800">
            Login
          </button>
        </div>



        <!-- Register Link -->
        <div class="text-center mt-4">
          <p class="text-gray-500">Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register Here</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>