@extends("layouts.layout")
        <!-- Login Form -->
        <div class="w-full max-w-md mx-auto mt-32">
            <h2 class="text-4xl font-['Ubuntu Sans Mono'] text-center mb-8">LOGIN</h2>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xl mb-1">Email</label>
                    <input id="email" name="email" type="email" class="block w-full px-4 py-2 border rounded-md focus:border-gray-500 focus:ring focus:ring-gray-300 rounded-md" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xl mb-1">Password</label>
                    <input id="password" name="password" type="password" class="block w-full px-4 py-2 border rounded-md focus:border-gray-500 focus:ring focus:ring-gray-300" required>
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
