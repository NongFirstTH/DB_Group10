<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Account') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen" style="background-color: #4F4A45">
        <!-- Main Grid Layout -->
        <div class="max-w-7xl mx-auto grid grid-cols-12 gap-6">

            <!-- Left Sidebar -->
            <div class="col-span-12 lg:col-span-3 space-y-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                            alt="Profile Photo"
                            class="w-28 h-28 rounded-full mx-auto object-cover shadow-md mb-4">
                        <h3 class="text-2xl font-bold mb-2">{{ Auth::user()->username }}</h3>
                    </div>
                    <ul class="space-y-4">
                        <li><a href="#" class="block hover:text-orange-600" onclick="showContent('accountOverview')">Account Overview</a></li>
                        <li><a href="#" class="block hover:text-orange-600" onclick="showContent('myOrders')">My Orders</a></li>
                        <li><a href="#" class="block hover:text-orange-600" onclick="showContent('changePassword')">Change Password</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form" class="inline">
                                @csrf
                                <a href="#" class="block hover:text-orange-600" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Center Content Area -->
            <div class="col-span-12 lg:col-span-9">
                <!-- Account Overview Section -->
                <div id="accountOverview" class="bg-white shadow-lg rounded-lg p-6 hidden transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold mb-4 text-orange-600" style="color: #ED7D31;">Account Overview</h3>
                    <p class="text-gray-800 text-lg">Welcome back, <span class="font-bold text-gray-900">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>!</p>

                    <div class="mt-4">
                        <h4 class="text-lg font-semibold text-gray-800 border-b border-gray-300 pb-2 mb-4">Your Information:</h4>
                        <ul class="list-disc list-inside mt-2 text-gray-700 space-y-2">
                            <li class="flex justify-between">
                                <span>Email:</span>
                                <span class="font-medium text-gray-800">{{ Auth::user()->email }}</span>
                            </li>
                            <li class="flex justify-between">
                                <span>Joined on:</span>
                                <span class="font-medium text-gray-800">{{ Auth::user()->created_at->format('F j, Y') }}</span>
                            </li>
                            <li class="flex justify-between">
                                <span>Location:</span>
                                <span class="font-medium text-gray-800">{{ Auth::user()->location }}</span>
                            </li>
                            <li class="flex justify-between">
                                <span>Phone Number:</span>
                                <span class="font-medium text-gray-800">{{ Auth::user()->phone_number }}</span>
                            </li>
                        </ul>
                        <!-- Edit Profile Button -->
                        <div class="mt-6">
                            <a href="{{ route('profile.edit') }}"
                                class="inline-block px-4 py-2 text-white rounded-md hover:bg-orange-600 transition duration-300 ease-in-out" style="background-color: #ED7D31;">
                                Edit Profile
                            </a>

                        </div>
                    </div>
                </div>


                <!-- My Orders Section -->
                <div id="myOrders" class="bg-white shadow-md rounded-lg p-6 hidden">
                    <h3 class="text-xl font-semibold mb-6" style="color: #ED7D31">My Orders</h3>
                    <p class="text-gray-800">You have no recent orders.</p>
                    <p class="text-gray-600 mt-2">Browse our store and place your first order!</p>
                </div>

                <!-- Change Password Section -->
                <div id="changePassword" class="bg-white shadow-md rounded-lg p-6 hidden transition-all duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold mb-6" style="color: #ED7D31">Change Password</h3>
                    <p class="text-gray-800">Update your account password.</p>
                    <p class="text-gray-600 mt-2">Use a strong and unique password for your account.</p>
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Handle Content Switch -->
    <script>
        function showContent(section) {
            // Hide all sections
            document.querySelectorAll('[id^="accountOverview"], [id^="myOrders"], [id^="myDetails"], [id^="changePassword"]').forEach(function(section) {
                section.classList.add('hidden');
            });

            // Show the selected section
            document.getElementById(section).classList.remove('hidden');
        }

        // By default, show the Account Overview section
        document.addEventListener('DOMContentLoaded', function() {
            showContent('accountOverview');
        });
    </script>
</x-app-layout>