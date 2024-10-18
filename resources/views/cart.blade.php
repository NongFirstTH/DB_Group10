<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<!-- <x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('My Orders') }}
  </h2>
</x-slot> -->

<body>
  <section class="py-24 relative">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">

      <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">Shopping Cart (Total
        {{$cartProducts->count()}} items)
      </h2>
      <div class="hidden lg:grid grid-cols-2 py-6">
        <div class="font-normal text-xl leading-8 text-gray-500">Product</div>
        <p class="font-normal text-xl leading-8 text-gray-500 flex items-center justify-between">
          <!-- <span class="w-full max-w-[200px] text-center">Price</span> -->
          <span class="w-full max-w-[260px] text-center">Quantity</span>
          <span class="w-full max-w-[200px] text-center">Total</span>
        </p>
      </div>



      @foreach ($cartProducts as $item)
      <!-- For Each Item -->
      <div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">
        <div
          class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full max-xl:justify-center max-xl:max-w-xl max-xl:mx-auto">
          <div class="img-box">
            <img src={{ $item->image }} alt="" class="xl:w-[140px] rounded-xl object-cover">
          </div>
          <div class="pro-data w-full max-w-sm ">
            <h5 class="font-semibold text-xl leading-8 text-black max-[550px]:text-center"> {{$item->product_name}}
            </h5>
            <p class="font-normal text-lg leading-8 text-gray-500 my-2 min-[550px]:my-3 max-[550px]:text-center">
              {{$item->category_name}}
            </p>
            <h6 class="font-medium text-lg leading-8 text-orange-600  max-[550px]:text-center">฿{{$item->price}}.00
            </h6>
          </div>
        </div>
        <div class="flex items-center flex-col min-[550px]:flex-row w-full max-xl:max-w-xl max-xl:mx-auto gap-2">
          <!-- <h6 class="font-manrope font-bold text-2xl leading-9 text-black w-full max-w-[176px] text-center">
      ฿15.00 <span class="text-sm text-gray-300 ml-3 lg:hidden whitespace-nowrap">(Delivery
      Charge)</span></h6> -->
          <div class="flex items-center w-full mx-auto justify-center">

            <!-- Minus Button -->
            <button
              class="group rounded-l-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
              <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
                <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6" stroke-linecap="round" />
              </svg>
            </button>

            <!-- Quantity Number -->
            <input type="text"
              class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[118px] min-w-[80px] placeholder:text-gray-900 py-[15px] text-center bg-transparent"
              placeholder={{$item->quantity}}>

            <!-- Plus Button -->
            <button
              class="group rounded-r-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
              <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black"
                xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round" />
                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                  stroke-linecap="round" />
                <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                  stroke-linecap="round" />
              </svg>
            </button>
          </div>
          <h6 class="text-orange-600 font-manrope font-bold text-2xl leading-9 w-full max-w-[176px] text-center">
            ฿{{$item->total_amount}}.00</h6>
        </div>
      </div>
      <!-- End For Each Item -->
      @endforeach


      @if($cartProducts->count() == 0)
      <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">Your Cart is Empty</p>
        <p class="text-sm">Go buy something !</p>
      </div>
      @else
      <form action="{{route('cart.checkout')}}" method="POST">
        @csrf
        <!-- Total Section -->

        <div class=" bg-gray-50 rounded-xl p-6 w-full mb-8 max-lg:max-w-xl max-lg:mx-auto">
          <div class="flex items-center justify-between w-full mb-6">
            <p class="font-normal text-xl leading-8 text-gray-400">Sub Total</p>
            <h6 class="font-semibold text-xl leading-8 text-gray-900">฿{{$subtotal}}.00
            </h6>
          </div>
          <div class="flex items-center justify-between w-full pb-6 border-b border-gray-200">
            <p class="font-normal text-xl leading-8 text-gray-400">Discount</p>
            <h6 class="font-semibold text-xl leading-8 text-gray-900">฿0.00</h6>
          </div>
          <div class="flex items-center justify-between w-full py-6">
            <p class="font-manrope font-medium text-2xl leading-9 text-gray-900">Total</p>
            <h6 class="font-manrope font-medium text-2xl leading-9 text-orange-500">฿{{$subtotal}}.00</h6>
          </div>
        </div>
        <div class="flex items-center flex-col sm:flex-row justify-center gap-3 mt-8">
          <button
            class="rounded-full py-4 w-full max-w-[280px]  flex items-center bg-orange-50 justify-center transition-all duration-500 hover:bg-orange-100">
            <span class="px-2 font-semibold text-lg leading-8 text-orange-600">Add Coupon Code</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
              <path d="M8.25324 5.49609L13.7535 10.9963L8.25 16.4998" stroke="#4F46E5" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
          <button type="submit"
            class="rounded-full w-full max-w-[280px] py-4 text-center justify-center items-center bg-orange-600 font-semibold text-lg text-white flex transition-all duration-500 hover:bg-orange-700">Checkout
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
              <path d="M8.75324 5.49609L14.2535 10.9963L8.75 16.4998" stroke="white" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </form>
      <!-- End Total Section -->
      @endif
    </div>


  </section>
</body>