@extends("layouts.layout")

@section('content')
<div class="min-h-screen w-full bg-gray-100">
  <div class="py-12 mt-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex p-6 bg-white border-b border-gray-200">

          <!-- Product Image -->
          <div class="w-1/2">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
          </div>

          <!-- Product Details -->
          <div class="w-1/2 pl-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $product->product_name }}</h1>
            <p class="text-gray-600 mt-2 mb-4">{{ $product->description }}</p>

            <div class="text-xl font-semibold text-gray-900">
              Price: ฿{{ number_format($product->price, 2) }}
            </div>

            <!-- Stock Availability -->
            <div class="text-lg mt-2 {{ $product->quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
              In Stock: {{ $product->quantity }} units
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST" class="mt-4" onsubmit="return validateAddToCart()">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="price" value="{{ $product->price }}">

              <div class="flex items-center space-x-2">
                <label for="quantity" class="text-lg">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="0" max="{{ $product->quantity }}"
                  class="border border-gray-300 rounded-md p-1 w-24 focus:ring-orange-400 focus:border-orange-400 transition duration-150 ease-in-out">
              </div>

              <button onClick="return validateAddToCart()" max="{{ $product->quantity }}"
                class=" mt-4 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 {{ $product->quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ $product->quantity == 0 ? 'disabled' : '' }}>
                Add to Cart
              </button>

            </form>
          </div>

          <<!-- Success and Error Messages -->
            <div class="fixed bottom-10 right-10 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg hidden"
              id="addToCartMessage">
              Added to cart!
            </div>

            <div class="fixed bottom-10 right-10 bg-red-500 text-white py-3 px-6 rounded-lg shadow-lg hidden"
              id="stockErrorMessage">
              Cannot add more than available stock!
            </div>
            <script>
              let hideMessageTimeout; // Timeout variable for managing message visibility

              function validateAddToCart() {
                const successMessage = document.getElementById('addToCartMessage');
                const errorMessage = document.getElementById('stockErrorMessage');
                const quantityInput = document.getElementById('quantity');
                const maxQuantity = parseInt(quantityInput.getAttribute('max'));
                const selectedQuantity = parseInt(quantityInput.value);

                // Clear any existing timeout
                clearTimeout(hideMessageTimeout);

                if (selectedQuantity > maxQuantity) {
                  // Show error message if quantity exceeds stock
                  errorMessage.classList.remove('hidden');
                  successMessage.classList.add('hidden'); // Hide success message


                  // Prevent form submission
                  return false;
                } else {
                  // Show success message
                  successMessage.classList.remove('hidden');
                  errorMessage.classList.add('hidden'); // Hide error message



                  // Allow form submission
                  return true;
                }
              }

              // Function to hide messages on click
              function hideMessagesOnClick() {
                const successMessage = document.getElementById('addToCartMessage');
                const errorMessage = document.getElementById('stockErrorMessage');

                successMessage.addEventListener('click', () => {
                  successMessage.classList.add('hidden');
                });

                errorMessage.addEventListener('click', () => {
                  errorMessage.classList.add('hidden');
                });
              }

              // Initialize message hiding on click
              hideMessagesOnClick();
            </script>

            <style>
              /* CSS to hide the messages when hidden class is applied */
              #addToCartMessage.hidden,
              #stockErrorMessage.hidden {
                display: none;
              }
            </style>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection