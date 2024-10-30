@extends("layouts.layout")
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/app.css')
</head>
<!-- <x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('My Orders') }}
  </h2>
</x-slot> -->

<body>
  <section class="py-24 relative">
    < class="w-full max-w-4xl px-4 md:px-5 lg-6 mx-auto">

      <h2 class="title font-manrope font-bold text-2xl leading-10 mb-8 text-center text-black">Shopping Cart (Total
        {{$cartProducts->count()}} items)
      </h2>
      @if($cartProducts->count() == 0)
      <div class="bg-orange-100 border-t border-b border-orange-500 text-orange-700 px-4 py-3" role="alert">
        <p class="font-bold">Your Cart is Empty</p>
        <p class="text-sm">Go buy something !</p>
      </div>
      @else
      <div class="hidden lg:grid grid-cols-2 py-6">
        <div class="font-normal text-l leading-8 text-gray-500">Product</div>
        <p class="font-normal text-l leading-8 text-gray-500 flex items-center justify-between">
          <!-- <span class="w-full max-w-[200px] text-center">Price</span> -->
          <span class="w-full max-w-[260px] text-center">Quantity</span>
          <span class="w-full max-w-[200px] text-center">Total</span>
        </p>
      </div>

      @foreach ($cartProducts as $item)
      <!-- For Each Item -->
      <div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-4 data-item-id="
        {{$item->id}}></div>
      <div
        class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full max-xl:justify-center max-xl:max-w-xl max-xl:mx-auto">
        <div class="img-box">
          <img src={{ $item->image }} alt="" class="xl:w-[140px] rounded-xl object-cover">
        </div>
        <div class="pro-data w-full max-w-sm ">
          <h5 class="font-semibold text-lg leading-8 text-black max-[550px]:text-center"> {{$item->product_name}}
          </h5>
          <p class="font-normal text-sm leading-8 text-gray-500 my-2 min-[550px]:my-3 max-[550px]:text-center">
            {{$item->category_name}}
          </p>
          <h6 class="pro-data font-medium text-sm leading-8 text-orange-600  max-[550px]:text-center">
            ฿{{$item->price}}.00
          </h6>
        </div>

      </div>
      <div class="flex items-center flex-col min-[550px]:flex-row w-full max-xl:max-w-xl max-xl:mx-auto gap-2">
        <div class="flex items-center w-full mx-auto justify-center">

          <!-- Minus Button -->
          <button
            class="decrease-quantity group rounded-l-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
              xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22" fill="none">
              <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
              <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
              <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
            </svg>
          </button>

          <!-- Quantity Number -->
          <input type="text"
            class="quantity-input border-y border-gray-200 outline-none text-gray-900 font-semibold text-sm w-full max-w-[118px] min-w-[80px] placeholder:text-gray-900 py-[15px] text-center bg-gray-100 focus:border-gray-200 focus:ring-0"
            min="1" max="{{$item->stock}}" value={{$item->quantity}} placeholder={{$item->quantity}} readonly>



          <!-- Plus Button -->
          <button
            class="increase-quantity group rounded-r-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
            <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
              xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22" fill="none">
              <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
              <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                stroke-linecap="round" />
              <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                stroke-linecap="round" />
            </svg>
          </button>
          <!-- Added Product Quantity to check if exceed stocks -->
          <div class="product-stock" data-stock="{{$item->stock}}"></div>
        </div>
        <h6 class="subtotal text-orange-600 font-manrope font-bold text-lg leading-9 w-full max-w-[176px] text-center">
          ฿{{$item->quantity * $item->price}}.00</h6>
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
      </div>

      <!-- Delete Button -->

      </form>
      </div>
      <!-- End For Each Item -->
      @endforeach


      <!-- Total Section -->
      <div class=" bg-gray-50 rounded-lg p-6 w-full mb-8 max-lg:max-w-xl max-lg:mx-auto">
        <div class="flex items-center justify-between w-full mb-6">
          <p class="font-normal text-sm leading-8 text-gray-400">Sub Total</p>
          <h6 id="subtotal-amount" class="subtotal-price font-semibold text-lg leading-8 text-gray-900">
            ฿{{$subtotal}}.00
          </h6>
        </div>
        <div class="flex items-center justify-between w-full pb-6 border-b border-gray-200">
          <p class="font-normal text-sm leading-8 text-gray-400">Discount</p>
          <h6 id="discount-amount" class="discount-price font-semibold text-lg leading-8 text-gray-900">
            ฿{{$discount}}.00</h6>
        </div>
        <div class="flex items-center justify-between w-full py-6">
          <p class="font-manrope font-medium text-lg leading-9 text-gray-900">Total</p>
          <h6 id="total-amount" class="total-price font-manrope font-medium text-lg leading-9 text-orange-500">
            ฿{{$subtotal - $discount}}.00</h6>
        </div>
      </div>
      <div class="flex items-center flex-col sm:flex-row justify-center gap-3 mt-8">

        <!-- Checkout button -->
        <button id="checkout-button" type="submit"
          class="rounded-full w-full max-w-[200px] py-4 text-center justify-center items-center bg-orange-600 font-semibold text-sm text-white flex transition-all duration-500 hover:bg-orange-700">Checkout
          <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
            <path d="M8.75324 5.49609L14.2535 10.9963L8.75 16.4998" stroke="white" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>

      <!-- End Total Section -->
      @endif
      </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/b`ootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {

    // Load Cart State from session storage
    let cartState = JSON.parse(sessionStorage.getItem('cartState')) || {};

    // Function to update total price
    let subtotal = @json($subtotal);
    let discount = @json($discount);
    let total = @json($subtotal) - @json($discount);

    function updateTotal() {
      subtotal = 0;
      $('.subtotal').each(function() {
        let subtotalText = $(this).text().replace('฿', '').trim();
        let subtotalValue = parseFloat(subtotalText); // Convert to float
        if (!isNaN(subtotalValue)) {
          subtotal += subtotalValue; // Add only valid numbers
        }
      });
      discount = 0; // Calculate discount here
      total = subtotal;
      if (subtotal > 1000) {
        discount = 0.1 * subtotal;
        total = subtotal - discount;
      }
      $('.subtotal-price').text('฿' + subtotal.toFixed(2)); // Update displayed total price
      $('.discount-price').text('฿' + discount.toFixed(2)); // Update displayed total price
      $('.total-price').text('฿' + total.toFixed(2)); // Update displayed total price
    }

    // Function to update row subtotal and total
    function updateRow(row, newQuantity) {
      let priceText = row.find('.pro-data h6').text(); // Get price text
      let price = parseFloat(priceText.replace(/฿|,/g, '').trim()); // Convert to float
      if (isNaN(price)) {
        console.error("Price is not a valid number:", priceText); // Log error if price is invalid
        return; // Exit if price is not valid
      }
      let subtotal = price * newQuantity; // Calculate subtotal
      row.find('.subtotal').text('฿' + subtotal.toFixed(2)); // Update subtotal

      // Save quantity in cart State
      let itemId = row.data('item-id');
      cartState[itemId] = newQuantity;
      sessionStorage.setItem('cartState', JSON.stringify(cartState));

      updateTotal(); // Update total
    }

    // Increase quantity button(NEW)
    $('.increase-quantity').on('click', function() {
      let quantityInput = $(this).siblings('.quantity-input');
      let currentQuantity = parseInt(quantityInput.val());
      let stockQuantity = parseInt($(this).siblings('.product-stock').data('stock'));
      // Check
      // if ordered quantity exceed stocks
      if (currentQuantity >= stockQuantity) {
        // Order exceeded stock
        alert('Order exceeded stock');
        quantityInput.val(currentQuantity);
        updateRow($(this).closest('.grid'), currentQuantity); // Update row subtotal
      } else {
        quantityInput.val(currentQuantity + 1);
        updateRow($(this).closest('.grid'), currentQuantity + 1); // Update row subtotal
      }

      // quantityInput.val(currentQuantity + 1);
      // updateRow($(this).closest('.grid'), currentQuantity + 1); // Update row subtotal
      updateTotal(); // Update the total amount after changing quantity
    });

    // Decrease quantity button
    $('.decrease-quantity').on('click', function() {
      let quantityInput = $(this).siblings('.quantity-input');
      let currentQuantity = parseInt(quantityInput.val());
      if (currentQuantity > 1) { // Prevent quantity from going below 1
        quantityInput.val(currentQuantity - 1);
        updateRow($(this).closest('.grid'), currentQuantity - 1); // Update row subtotal
        updateTotal(); // Update the total amount after changing quantity
      }
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.each(cartState, function(itemId, quantity) {
      let row = $('.grid[data-item-id="' + itemId + '"]'); // Assuming you set data-item-id on each row
      if (row.length) {
        row.find('.quantity-input').val(quantity);
        updateRow(row, quantity);
      }
    });

    $('#checkout-button').on('click', function(e) {
      e.preventDefault();

      // collect productName & newQuantity from each row
      let products = [];
      $('.grid').each(function() {
        let productName = $(this).find('.pro-data h5').text();
        let newQuantity = $(this).find('.quantity-input').val();
        products.push({
          name: productName,
          quantity: newQuantity
        });
      });

      $.ajax({
        data: {
          products: products,
          subtotalAmount: subtotal,
          discountAmount: discount,
          totalAmount: total
        },
        type: 'POST',
        url: '{{ route("cart.checkout") }}',
        success: function(response) {
          console.log(response);
          window.location.href = '{{ route("order.confirmation") }}';
        },
        error: function(response) {
          console.error(response);
          alert('Checkout failed. Please try again.');
        }
      });
    });
  });
  </script>
</body>

</html>