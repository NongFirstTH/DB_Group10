@extends("layouts.layout")
@include("category.show-category")

<div class="flex justify-center">
    <svg width="1293" height="5" viewBox="0 0 1293 4" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.8" d="M0 3L1293 1" stroke="black"/>
    </svg>
</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-10 mt-20 mr-8 ml-8">
    @foreach ($products as $product)
    @if ($product -> quantity == 0)
        <a
            class = "cursor-not-allowed opacity-50 disabled border-gray-100 border-2 rounded-3xl shadow-md flex flex-col items-center bg-white"
        >
        <p class="font-bold text-xl text-red-600 mt-2">out of stock</p>
        <div class="mb-4 mt-4">
            <img src={{ $product->image }} class="w-52 h-52 rounded-lg object-cover">
        </div>
    @else
        <a href="{{route('product.show', $product -> id) }}"
            class = "transform transition duration-300 hover:scale-105 border-gray-100 border-2 rounded-3xl shadow-md flex flex-col items-center bg-white"
        >
        <div class="mb-4 mt-4">
            <img src={{ $product->image }} class="w-52 h-52 rounded-lg object-cover">
        </div>
    @endif
                <div class="text-wrap text-center font-bold">
                    <p>{{$product -> product_name}}</p>
                </div>
                
                <div class="flex items-center space-x-4 mb-4 mt-4">
                            <div>
                                <p>{{$product -> price}} bath</p>
                            </div>
                        </div>
        </a>
    @endforeach

</div>