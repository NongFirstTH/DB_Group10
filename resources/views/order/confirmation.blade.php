@extends("layouts.layout")
<div class="min-h-screen flex bg-gray-100">
  <div class="mt-28 max-w-auto mx-auto max-h-l">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md text-center">
      <h1 class="text-5xl font-bold text-center ">Your order has been placed successfully! Thank you for shopping with
        us.</h1>
      <!-- <div class="flex justify-between items-center mt-6"> -->
      <button>
        <a href="{{ route('home') }}" class="text-lg underline text-gray-700 hover:text-gray-900">
          {{ __('Back to home ') }}
        </a>
      </button>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>
</div>