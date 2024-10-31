@extends("layouts.layout")

@section("content")

<div class="flex flex-col items-center bg-white-100 mb-5 p-8 rounded-lg  max-w-lg mx-auto">

    <!-- Title -->
        <h1 class="text-5xl font-bold mt-11 text-center">SHOGGY</h1>
        <p class="text-xl text-gray-500 mt-2 text-center">the shopping website</p>

    <!-- Image -->
    <div class="relative"> 
        <img src="https://img.freepik.com/free-photo/studio-shot-papillon-fallen-little-dogs-isolated-white-studio-wall_155003-42995.jpg?t=st=1730191597~exp=1730195197~hmac=e5b39972702099448d5f24220f5e4bc22b87bd8d61fc3e71579b45d9e2d68a87&w=996" 
        alt="Dog" class="w-full h-auto rounded-full mx-auto">
    </div>
    
    <!-- Description -->
    <div class="mt-6 text-center">
        <p class="text-3xl font-semibold">THE BEST OF DOG SUPPLIES!</p>
    </div>

    <!-- Button -->
    <a href="{{url('/category')}}" class="inline-block bg-orange-500 text-white font-bold pt-3 py-4 px-6 mt-5 rounded hover:bg-orange-600 transition text-center">
                            shop now
    </a>
</div>
@endsection
