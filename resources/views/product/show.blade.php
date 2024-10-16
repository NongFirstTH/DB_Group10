<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    
                    <!-- Product Image -->
                    <div class="w-1/2">
                    <img src="{{  $product->image }}" alt="{{ $product->name }}">


                    </div>
                    
                    <!-- Product Details -->
                    <div class="w-1/2 pl-8">
                        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                        <div class="text-gray-600 text-lg mt-4 mb-6">
                            {{ $product->description }}
                        </div>

                        <div class="text-2xl font-semibold text-gray-900">
                            Price: ${{ number_format($product->price, 2) }}
                        </div>

                        <!-- Stock Availability -->
                        <div class="text-green-600 text-lg mt-2">
                            In Stock: {{ $product->quantity }} units
                        </div>
                        
                        <!-- Quantity Selector -->
                        <div class="mt-4">
                            <label for="quantity" class="block font-medium text-gray-700">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" class="mt-1 block w-20 p-2 border border-gray-300 rounded-md">
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="mt-6">
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900">
                                Add to Cart
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
