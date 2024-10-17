<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('My Account') }}
    </h2>
  </x-slot>

  <div class="py-12 min-h-screen" style="background-color: #4F4A45">
    <div class="max-w-7xl mx-auto grid grid-cols-12 gap-6"
      x-data="{ openProfile: false, openPhoto: false, showInfo: true }">
      <!-- Left Sidebar -->
      <div class="col-span-12 lg:col-span-3 space-y-6">
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-center mb-4 relative">
            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
              class="w-28 h-28 rounded-full mx-auto object-cover shadow-md mb-4">

            <h3 class="text-2xl font-bold mb-2">{{ Auth::user()->username }}</h3>
          </div>
          <ul class="space-y-4">
            <li><a href="{{ route('profile.show.profile') }}" class="block text-orange-600 font-semibold">Account
                Overview</a></li>
            <li><a href="{{ route('profile.show.orders') }}" class="block hover:text-orange-600">My Orders</a></li>
            <li><a href="{{ route('profile.show.changePassword') }}" class="block hover:text-orange-600">Change
                Password</a></li>
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

      <!-- Center Content Area -->
      <div class="col-span-12 lg:col-span-9">
        <div class="bg-white shadow-lg rounded-lg p-6">
          <h3 class="text-xl font-semibold mb-4 text-orange-600">Account Overview</h3>
          <p class="text-gray-800 text-lg">Welcome back, <span
              class="font-bold text-gray-900">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>!</p>

          <!-- User Information -->
          <div x-show="showInfo" id="profileInfo" class="mt-4">
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
          </div>

          <!-- Button for toggling between Edit Profile and Edit Photo -->
          <div class="flex space-x-4 mt-4">
            <button class="text-white px-4 py-2 rounded-md hover:bg-gray-700" @click="
                                if (openProfile) {
                                    openProfile = false; 
                                    showInfo = true; 
                                } else {
                                    openProfile = true; 
                                    openPhoto = false; 
                                    showInfo = false;
                                }" style="background-color: #4F4A45">
              <span x-text="openProfile ? 'Back' : 'Edit Profile'"></span>
            </button>

            <button class="text-white px-4 py-2 rounded-md hover:bg-gray-700" @click="
                                if (openPhoto) {
                                    openPhoto = false; 
                                    showInfo = true; 
                                } else {
                                    openPhoto = true; 
                                    openProfile = false; 
                                    showInfo = false;
                                }" style="background-color: #4F4A45">
              <span x-text="openPhoto ? 'Back' : 'Edit Photo'"></span>
            </button>
          </div>

          <!-- Update Profile Form -->
          <div x-show="openProfile" class="mt-4 space-y-4">
            @include('profile.partials.update-profile-information-form')
          </div>

          <!-- Update Photo Form -->
          <div x-show="openPhoto" class="mt-4 space-y-4">
            @include('profile.partials.update-profile-photo-form')
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>