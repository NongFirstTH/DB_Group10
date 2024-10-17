@extends("layouts.layout")

@section("content")
<div class="flex flex-col items-center bg-white-100 mb-5 p-8 rounded-lg  max-w-lg mx-auto">

    <!-- Title -->
        <h1 class="text-5xl font-bold mt-11 text-center">SHOGGY</h1>
        <p class="text-xl text-gray-500 mt-2 text-center">the shopping website</p>

    <!-- Image -->
    <div class="relative"> 
        <img src="https://s3-alpha-sig.figma.com/img/c11c/f2ef/37b6693f428f43d688bb5b533b603376?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=M1g0XARswnafNUyRFxtAwnMoQV-8OySa~5jUEq0GGgdDpip2k62GIB5nVqYgA5UfsR-XiYrBepdBvx1DqmY7uekEcxu9EARYOfcMbjwfKVTMUJIYdiQdu1WqkE-gurkXtPyizh2yus86Tndv3uE7yyd0P6SNqZHnC42-lCRgeC0xQ1J4FmbicUh7UWqkIlnBN-hOVOxkp~GDaJgwOK0-12zR2s-xOvvpAu3P3VASaDr9kR9nc9Cu7ulXbYIyPOlmXswPAzKcXWaBiJA9q3HxnWWiSGg5PWw~h8bN9RLXfmncbv80j~klkN9LWInVIxQtpc8CuvceBTrbXUpf3EENmQ__" 
        alt="Dog" class="w-full h-auto rounded-full mx-auto">
    </div>
    
    <!-- Description -->
    <div class="mt-6 text-center">
        <p class="text-3xl font-semibold">THE BEST OF DOG SUPPLIES!</p>
    </div>

    <!-- Button -->
    <a href="{{url('/homepage')}}" class="inline-block bg-orange-500 text-white font-bold pt-3 py-4 px-6 mt-5 rounded hover:bg-orange-600 transition text-center">
                            shop now
    </a>
</div>

@endsection
