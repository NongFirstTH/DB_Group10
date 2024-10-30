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
    <x-text-input id="username" name="username" type="text"
      class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
      :value="old('username', auth()->user()->username)" required autofocus autocomplete="username" />
    <x-input-error class="mt-2" :messages="$errors->get('username')" />
  </div>

  <!-- Email -->
  <div>
    <x-input-label for="email" :value="__('Email')" class="text-gray-900" />

    <!-- Display Email as a Disabled Input -->
    <x-text-input id="email_display" name="email_display" type="email"
      class="mt-1 block w-full border border-gray-300 p-2 rounded-md bg-gray-200"
      :value="old('email', auth()->user()->email)" required autocomplete="username" disabled />

    <!-- Hidden Input to Send Email Value -->
    <input type="hidden" name="email" value="{{ old('email', auth()->user()->email) }}" />

    <x-input-error class="mt-2" :messages="$errors->get('email')" />
  </div>




  <!-- Firstname -->
  <div>
    <x-input-label for="firstname" :value="__('First Name')" class="text-gray-900" />
    <x-text-input id="firstname" name="firstname" type="text"
      class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
      :value="old('firstname', auth()->user()->firstname)" required autocomplete="firstname" />
    <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
  </div>

  <!-- Lastname -->
  <div>
    <x-input-label for="lastname" :value="__('Last Name')" class="text-gray-900" />
    <x-text-input id="lastname" name="lastname" type="text"
      class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
      :value="old('lastname', auth()->user()->lastname)" required autocomplete="lastname" />
    <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
  </div>

  <!-- Phone Number -->
  <div>
    <x-input-label for="phone_number" :value="__('Phone Number')" class="text-gray-900" />
    <div class="flex mt-2">
      <select id="country_code" name="country_code"
        class="border border-gray-300 p-2 rounded-md bg-white focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500">
        <option value="+1">+1 (US/Canada)</option>
        <option value="+44">+44 (UK)</option>
        <option value="+91">+91 (India)</option>
        <option value="+61">+61 (Australia)</option>
        <option value="+81">+81 (Japan)</option>
        <option value="+82">+82 (South Korea)</option>
        <option value="+49">+49 (Germany)</option>
        <option value="+33">+33 (France)</option>
        <option value="+86">+86 (China)</option>
        <option value="+34">+34 (Spain)</option>
        <option value="+39">+39 (Italy)</option>
        <option value="+7">+7 (Russia)</option>
        <option value="+55">+55 (Brazil)</option>
        <option value="+27">+27 (South Africa)</option>
        <option value="+46">+46 (Sweden)</option>
        <option value="+65">+65 (Singapore)</option>
        <option value="+62">+62 (Indonesia)</option>
        <option value="+66">+66 (Thailand)</option>
        <option value="+92">+92 (Pakistan)</option>
        <option value="+234">+234 (Nigeria)</option>
        <option value="+351">+351 (Portugal)</option>
        <option value="+41">+41 (Switzerland)</option>
        <option value="+47">+47 (Norway)</option>
        <option value="+31">+31 (Netherlands)</option>
        <option value="+90">+90 (Turkey)</option>
        <option value="+63">+63 (Philippines)</option>
        <option value="+880">+880 (Bangladesh)</option>
        <option value="+420">+420 (Czech Republic)</option>
        <option value="+48">+48 (Poland)</option>
        <option value="+60">+60 (Malaysia)</option>
        <!-- Add other country codes as needed -->
      </select>
      <x-text-input id="phone_number" name="phone_number" type="text" pattern="\d{10}" maxlength="10" minlength="10"
        class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
        title="Please enter a valid 10-digit phone number" placeholder="Enter 10-digit phone number"
        :value="old('phone_number', auth()->user()->phone_number)" required autocomplete="phone_number" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
  </div>

  <!-- Location -->
  <div>
    <x-input-label for="location" :value="__('Location')" class="text-gray-900" />
    <x-text-input id="location" name="location" type="text"
      class="mt-1 block w-full border border-gray-300 p-2 rounded-md transition duration-200 ease-in-out focus:border-orange-500 focus:ring focus:ring-orange-500 hover:border-orange-500"
      :value="old('location', auth()->user()->location)" required autocomplete="location" />
    <x-input-error class="mt-2" :messages="$errors->get('location')" />
  </div>

  <!-- Save and Manage Bio/Personality Button -->
  <div class="flex items-center gap-4 mt-6">
    <button class="text-white px-4 py-2 rounded-md bg-orange-500 hover:bg-[#FF8343]">
      {{ __('Save') }}
    </button>

    @if (session('status') === 'profile-updated')
    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
      class="text-sm text-green-600">{{ __('Profile Information Saved') }}</p>
    @endif
  </div>
</form>
<!-- </section> -->