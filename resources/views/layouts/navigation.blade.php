<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-600 fixed w-full z-20 top-0">
  <div class="max-w-screen-xl mx-auto flex justify-between items-center p-3">
    
    <!-- Logo (Left) -->
    <div class="flex items-center">
        <img src="https://cdn.dribbble.com/users/1296676/screenshots/6942574/media/a112f8f10da4463d1030264a25f78eea.jpg" alt="Logo" class="h-10 w-10 rounded-full">
        <a href="{{ url('/category') }}" class="ml-3 text-2xl font-semibold text-gray-800 dark:text-white hover:text-orange-600 transition">
            SHOGGY
        </a>
    </div>
    
    <!-- Buttons (Right) -->
    <div class="flex space-x-6 items-center">
    <?php
        use App\Models\Cart;
        if (Auth::user() != null) {
            $cartItem = Cart::where('user_id', Auth::user()->id)->first();
        }
    ?>
    @if (Auth::check())
        @auth
            <a href="{{ route('cart.show') }}" class="text-white relative inline-block">
                <i class="bi bi-cart-fill text-2xl text-gray-800 dark:text-white"></i>
                @if ($cartItem)
                    <span class="absolute top-0 right-0 w-3 h-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                @endif
            </a>
            <a href="{{ route('profile.show-profile') }}" class="text-gray-800 dark:text-white">
                <i class="bi bi-person-circle text-2xl"></i>
            </a>
            <span class="ml-2 text-gray-800 dark:text-white font-medium">{{ Auth::user()->username }}</span>
        @endauth
    @else
        <a href="{{ route('register') }}" class="text-gray-800 dark:text-gray-300 hover:text-orange-600 transition">
            Register
        </a>
        <a href="{{ route('login') }}" class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-500 dark:hover:bg-orange-600 dark:focus:ring-orange-800 transition">
            Login
        </a>
    @endif
    </div>
  </div>
</nav>
