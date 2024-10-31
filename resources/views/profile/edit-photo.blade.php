@extends("layouts.layout")

    <div class="py-12 mt-28 mb-4">
        <div class="max-w-7xl mx-auto grid grid-cols-12 gap-6">
            <!-- Left Sidebar -->
            <div class="col-span-12 lg:col-span-3 space-y-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                            class="w-28 h-28 rounded-full mx-auto object-cover shadow-md mb-4">
                        <h3 class="text-2xl font-bold mb-2">{{ Auth::user()->username }}</h3>
                    </div>
                    <ul class="space-y-4">
                        <li><a href="{{ route('profile.show-profile') }}" class="block text-orange-600 font-semibold">Account Overview</a></li>
                        <li><a href="{{ route('profile.show-order') }}" class="block hover:text-orange-600">My Orders</a></li>
                        <li><a href="{{ route('profile.update.password') }}" class="block hover:text-orange-600">Change Password</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form" class="inline">
                                @csrf
                                <a href="#" class="block hover:text-orange-600"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-9">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-orange-600">Change Password</h3>
                    <p class="text-gray-800 mb-6">Update your account password.</p>
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-photo-form')
                    </div>
                </div>
            </div>
        </div>
    </div>