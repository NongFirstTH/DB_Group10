<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-600 fixed w-full z-20 top-0">
  <div class="max-w-screen-xl mx-auto flex justify-between items-center p-3">
    
    <!-- Logo (Left) -->
    <div class="flex items-center">
        <img src="https://cdn.dribbble.com/users/1296676/screenshots/6942574/media/a112f8f10da4463d1030264a25f78eea.jpg" class="h-10">
        <a href="{{url('/category')}}" class="ml-3 text-2xl font-semibold dark:text-white">
            SHOGGY
        </a>
    </div>
    <!-- Buttons (Right) -->
    <div class="flex space-x-4 items-center">
    <?php
        use App\Models\Cart;
        if (Auth::user() != null)
        $cartItem = Cart::where('user_id', Auth::user()->id)->first();
    ?>
    @if (Auth::check())
        @auth
            <button class="text-black mr-4">
            <a href="{{ route('cart.cart') }}" class="text-black relative inline-block">
                <i class="bi bi-cart-fill" style="font-size: 1.5rem; color: black;"></i>
            @if ($cartItem)
                <span class="absolute top-0 right-0 w-3 h-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-50"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
            @endif
            </a>

            </button>
            <a href="{{ route('profile.show-profile') }}" class="text-black">
                <i class="bi bi-person-circle" style="font-size: 1.5rem; color: black;"></i>
            </a>
            <span class="ml-2">{{ Auth::user()->username }}</span>
        @endauth
    @else
            <a href="{{ route('register') }}" class="hover:text-gray-600">
                Register
            </a>
            <a href="{{ route('login') }}" class="text-white bg-orange-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                Login
            </a>
    @endif
</div>

</nav>
