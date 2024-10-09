@extends("layouts.layout")

@section("content")

<p> {{$categories}}</p>
<div class="grid grid-cols-2 md:grid-cols-4  gap-12 mb-10 mt-20 mr-8 ml-8">

    @if ($products->isEmpty())
    <p>No products found.</p>
    @else
    @foreach ($products as $product)
        <div class="border-gray-100 border-2 rounded-3xl shadow-md flex flex-col items-center bg-white">

            <div class="mb-4 mt-4">
                <img src={{ $product->image }} class="w-52 h-52 rounded-lg object-cover">
            </div>

            <div class="text-wrap text-center font-bold">
                <p>{{$product -> product_name}}</p>
            </div>

            <div class="flex items-center space-x-4 mb-4 mt-4">
                <div>
                    <p>{{$product -> price}} bath</p>
                </div>

                <!-- <button class="px-2 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded"> &lt; </button>
                    <span class="text-lg font-medium">0</span>
                <button class="px-2 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded"> &gt; </button> -->
            </div>

        </div>
    @endforeach
    @endif

</div>

@endsection