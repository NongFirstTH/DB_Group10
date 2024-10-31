@extends("layouts.layout")

@section('content')
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
            <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <input type="hidden" name="price" value="{{ $product->price }}">

              <div class="flex items-center space-x-2">
                <label for="quantity" class="text-lg">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="0" max="{{ $product->quantity }}"
                  class="border border-gray-300 rounded-md p-1 w-24 focus:ring-orange-400 focus:border-orange-400 transition duration-150 ease-in-out">
              </div>

              <button button id="addToCartButton" type="submit" onclick="showAddToCartMessage({{ $product->id }})"
                class=" mt-4 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 {{ $product->quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ $product->quantity == 0 ? 'disabled' : '' }}>
                Add to Cart
              </button>

            </form>
          </div>

          <!-- Success and Error Messages -->
          <div class="fixed bottom-10 right-10 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg hidden"
            id="addToCartMessage">
            Added to cart!
          </div>

          <div class="fixed bottom-10 right-10 bg-red-500 text-white py-3 px-6 rounded-lg shadow-lg hidden"
            id="stockErrorMessage">
            Cannot add more than available stock!
          </div>
          <!-- HTML -->
          <script>
          let hideMessageTimeout = null; // Define a single timeout variable

          function showAddToCartMessage() {
            const message = document.getElementById('addToCartMessage');

            // Show the message instantly without CSS transitions
            message.classList.remove('hidden');

            // Clear any existing timeout so it won’t hide prematurely
            if (hideMessageTimeout) {
              clearTimeout(hideMessageTimeout);
            }

            // Set a new timeout to hide the message exactly 2 seconds later
            hideMessageTimeout = setTimeout(() => {
              message.classList.add('hidden');
            }, 6000); // 2000 milliseconds = 2 seconds
          }
          </script>

          <style>
          /* Make sure the "hidden" class instantly hides the element with no transition */
          #addToCartMessage.hidden {
            display: none;
          }

          #addToCartMessage {
            display: block;
          }
          </style>

        </div>
      </div>
    </div>
  </div>
@endsection
