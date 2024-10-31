@extends("layouts.layout")

<section class="py-28">
  <div class="container max-w-6xl mx-auto flex flex-col lg:flex-row gap-8 px-4 md:px-5 lg:px-6">

    <!-- Products Section -->
    <div class="flex-1 gap-2">
      <h2 class="title font-manrope font-bold text-2xl leading-10 mb-8 text-center text-black">
        Shopping Cart (Total {{$cartProducts->count()}} items)
      </h2>

      <div class="hidden lg:grid grid-cols-2 py-6">
        <div class="font-normal text-lg leading-8 text-gray-500">Product</div>
        <div class="flex justify-between font-normal text-lg leading-8 text-gray-500">
          <span class="w-full max-w-[260px] text-center">Quantity</span>
          <span class="w-full max-w-[200px] text-center">Total</span>
        </div>
      </div>

      @foreach ($cartProducts as $item)
      <!-- For Each Item -->
      <div class="grid grid-cols-1 lg:grid-cols-2 border-t border-gray-200 py-4">
        <div class="flex items-center flex-col lg:flex-row gap-4 lg:gap-6 w-full">
          <div class="img-box">
            <img src="{{ $item->image }}" alt="" class="xl:w-[140px] rounded-xl object-cover">
          </div>
          <div class="pro-data w-full max-w-sm text-center">
            <h5 class="font-semibold text-md leading-8 text-black">{{$item->product_name}}</h5>
            <h6 class="font-medium text-sm leading-8 text-orange-600">฿{{$item->price}}</h6>
          </div>
        </div>

        <div class="flex items-center flex-col lg:flex-row w-full gap-4">
          <!-- Form for Quantity Update -->
          <form action="{{ route('cart.update', $item->id) }}" method="POST"
            class="flex items-center w-full justify-center gap-2">
            @csrf
            @method('PUT')
            <!-- Use PUT method to update -->

            <!-- Minus Button -->
            <button name="action" value="decrease" type="submit"
              class="decrease-quantity group rounded-l-full px-4 py-2 border border-gray-200 flex items-center justify-center shadow-sm transition-all duration-300 hover:bg-gray-50 hover:border-gray-300">
              <svg class="stroke-gray-900 transition-all duration-300 group-hover:stroke-black"
                xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 22 22">
                <path d="M16.5 11H5.5" stroke-width="1.6" stroke-linecap="round" />
              </svg>
            </button>

            <!-- Quantity Number -->
            <input type="text" name="quantity" value="{{$item->quantity}}"
              class="quantity-input border border-gray-300 outline-none text-gray-900 font-semibold text-sm w-full max-w-[60px] placeholder:text-gray-900 py-2 text-center bg-transparent"
              min="1" max="{{$item->stock}}">

            <!-- Plus Button -->
            <button name="action" value="increase" type="submit"
              class="increase-quantity group rounded-r-full px-4 py-2 border border-gray-200 flex items-center justify-center shadow-sm transition-all duration-300 hover:bg-gray-50 hover:border-gray-300">
              <svg class="stroke-gray-900 transition-all duration-300 group-hover:stroke-black"
                xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 22 22">
                <path d="M11 5.5V16.5M16.5 11H5.5" stroke-width="1.6" stroke-linecap="round" />
              </svg>
            </button>
          </form>
          <div>
            <h6 class="subtotal text-orange-600 font-manrope font-bold text-lg leading-9 text-center">
              ฿{{$item->quantity * $item->price}}
            </h6>
          </div>

          <!-- Delete Button -->
          <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="flex items-center">
            @csrf
            @method('DELETE')
            <!-- Use DELETE method to remove the item -->
            <button type="submit"
              class="text-red-600 font-semibold flex items-center gap-1 hover:text-red-800 transition duration-300">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <!-- Trash can lid -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3h6m-7 4h8" />
                <!-- Trash can body -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 7v12a2 2 0 002 2h6a2 2 0 002-2V7H7z" />
                <!-- Vertical lines inside the trash can -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11v6M14 11v6" />
              </svg>

            </button>
          </form>
        </div>
      </div>
      @endforeach

      @if($cartProducts->isEmpty())
      <div class="bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
        <p class="font-bold">Your Cart is Empty</p>
        <p class="text-sm">Go buy something!</p>
      </div>
      @endif
    </div>

    <!-- Checkout Section -->
    <div class="flex-none bg-gray-50 rounded-lg p-6 w-full max-w-xs px-8">
      <h2 class="font-manrope font-bold text-lg leading-8 text-gray-900 mb-4">Checkout</h2>
      @if($cartProducts->count() > 0)
      <div class="flex items-center justify-between mb-4">
        <p class="font-normal text-sm leading-8 text-gray-400">Sub Total</p>
        <h6 id="subtotal-amount" class="subtotal-price font-semibold text-lg leading-8 text-gray-900">฿{{$subtotal}}
        </h6>
      </div>
      <div class="flex items-center justify-between mb-4 border-b border-gray-200">
        <p class="font-normal text-sm leading-8 text-gray-400">Discount</p>
        <h6 id="discount-amount" class="discount-price font-semibold text-lg leading-8 text-gray-900">฿{{$discount}}
        </h6>
      </div>
      <div class="flex items-center justify-between mb-6">
        <p class="font-manrope font-medium text-lg leading-9 text-gray-900">Total</p>
        <h6 id="total-amount" class="total-price font-manrope font-medium text-lg leading-9 text-orange-500">
          ฿{{$subtotal - $discount}}</h6>
      </div>

      <form action="{{ route('cart.checkout') }}" method="POST" class="flex items-center justify-center mt-4">
        @csrf
        <!-- Hidden inputs for required data -->
        <input type="hidden" name="subtotalAmount" value="{{ $subtotal }}">
        <input type="hidden" name="discountAmount" value="{{ $discount }}">
        <input type="hidden" name="totalAmount" value="{{ $subtotal - $discount }}">

        <!-- Pass products as an array with name, quantity, and price -->
        @foreach($cartProducts as $item)
        <input type="hidden" name="products[{{ $loop->index }}][name]" value="{{ $item->product_name }}">
        <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
        <input type="hidden" name="products[{{ $loop->index }}][price]" value="{{ $item->price }}">
        @endforeach

        <button id="checkout-button" type="submit"
          class="rounded-full w-full py-4 text-center bg-orange-600 font-semibold text-sm text-white flex justify-center items-center transition-all duration-300 hover:bg-orange-700">
          CHECKOUT
        </button>
      </form>
      @endif
    </div>
  </div>
</section>

<!-- Error Message -->
@if(session('error'))
<div class="fixed bottom-10 right-10 bg-red-500 text-white py-3 px-6 rounded-lg shadow-lg hidden"
  id="checkoutErrorMessage">
  {{ session('error') }}
</div>
@endif

<script>
let hideMessageTimeout = null;

function showCheckoutErrorMsg() {

  const message = document.getElementById('checkoutErrorMessage');
  message.classList.remove('hidden');

  if (hideMessageTimeout) {
    clearTimeout(hideMessageTimeout);
  }

  hideMessageTimeout = setTimeout(() => {
    message.classList.add('hidden');
  }, 1000);
}

window.onload = function() {
  const errorMessage = "{{session('error')}}";
  if (errorMessage) {
    showCheckoutErrorMsg();
  }
};
</script>

<style>
#checkoutErrorMessage.hidden {
  display: none;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/b`ootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  $(".quantity-input").on("change", function() {
    $(this).closest("form").submit();
  });
});
</script>