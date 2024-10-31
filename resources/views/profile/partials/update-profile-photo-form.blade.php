<form method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="space-y-4">
  @csrf
  @method('post')
  <div class="flex flex-col space-y-1">
    <x-input-label for="profile_photo" :value="__('Profile Photo')" class="text-gray-700" />
    <input type="file" name="profile_photo" id="profile_photo">
    <x-input-error class="text-red-500 text-sm" :messages="$errors->get('profile_photo')" />
  </div>

  <div class="flex items-center gap-4">
    <button class="text-white px-4 py-2 rounded-md bg-orange-500 hover:bg-[#FF8343]">
      {{ __('Save') }}
    </button>

    @if (session('status') === 'photo-updated')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
      class="text-sm text-green-500 dark:text-green-400">{{ __('Photo Updated') }}</p>
    @endif
  </div>
</form>

<!-- <div class="flex flex-col space-y-2">
    <x-input-label for="current_photo" :value="__('Current Profile Photo')" class="text-gray-700" />
    <div class="flex items-center">
        @if(Auth::user()->profile_photo)
        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-24 h-24 object-cover rounded-full border border-gray-300 shadow-md">
        @else
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('No profile photo uploaded.') }}</p>
        @endif
    </div>
</div> -->