<!-- <nav x-data="{ open: false }" class="bg-[#f98433]">
    <div dir = "rtl">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <x-nav-link :href="route('homepage.index')" :active="request()->routeIs('homepage.index')">
                            {{ __('Login') }}
        </x-nav-link>
    </div>
    </div>
</nav>  -->



<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-600 fixed w-full z-20 top-0">
  <div class="max-w-screen-xl mx-auto flex justify-between items-center p-3">
    
    <!-- Logo (Left) -->
    <div class="flex items-center">
      <img src="https://cdn.dribbble.com/users/1296676/screenshots/6942574/media/a112f8f10da4463d1030264a25f78eea.jpg" alt="Logo" class="h-10">
      <span class="ml-3 text-2xl font-semibold dark:text-white">SHOGGY</span>
    </div>
    
    <!-- HomePage Link (Middle) -->
    <!-- <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <x-nav-link :href="route('homepage.index')" :active="request()->routeIs('homepage.index')">
                            {{ __('HomePage') }}
        </x-nav-link>
    </div> -->
    
    <!-- Buttons (Right) -->
    <div class="flex space-x-4">
        <button class="text-black ">
            Register
        </button>
        <button class="text-white bg-orange-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
            Login
        </button>
    </div>


</nav>



