@extends("layouts.layout")
  <div class="mt-28 max-w-auto mx-auto max-h-l">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-xl text-center">
      <h1 class="text-5xl font-bold text-center ">Your order has been placed successfully!</h1>
      <h1 class="text-4xl text-center mt-3 text-orange-700">Thank you for shopping with
        us.</h1>
      <!-- <div class=" flex justify-between items-center mt-6"> -->
      <div class="mt-4">
        <button>
          <a href="{{ route('home') }}" class="text-lg underline text-gray-700 hover:text-gray-900">
            {{ __('Back to home ') }}
          </a>
        </button>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>