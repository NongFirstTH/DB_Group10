<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('My Orders') }}
    </h2>
  </x-slot>

  <div class="py-12 min-h-screen" style="background-color: #4F4A45">
    <div class="max-w-7xl mx-auto grid grid-cols-12 gap-6">
      <!-- Left Sidebar -->
      <div class="col-span-12 lg:col-span-3 space-y-6">
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-center mb-4">
            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
              class="w-28 h-28 rounded-full mx-auto object-cover shadow-md mb-4">
            <h3 class="text-2xl font-bold mb-2">{{ Auth::user()->username }}</h3>
          </div>
          <ul class="space-y-4">
            <li><a href="{{ route('profile.show.profile') }}" class="block hover:text-orange-600">Account Overview</a>
            </li>
            <li><a href="{{ route('profile.show.orders') }}" class="block text-orange-600 font-semibold">My Orders</a>
            </li>
            <li><a href="{{ route('profile.show.changePassword') }}" class="block hover:text-orange-600">Change
                Password</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}" id="logout-form" class="inline">
                @csrf
                <a href="#" class="block hover:text-orange-600"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Log Out') }}
                </a>
              </form>
            </li>
          </ul>
        </div>
      </div>

      <!-- Center Content Area -->
      <div class="col-span-12 lg:col-span-9">
        <div class="bg-white shadow-lg rounded-lg p-6">
          <h3 class="text-xl font-semibold mb-4 text-orange-600">My Orders</h3>
          @if ($orders->isEmpty())
          <p class="text-gray-700">You have no orders.</p>
          @else
          <ul class="space-y-4">
            @foreach ($orders as $order)
            <li class="border border-gray-200 rounded-md shadow-sm p-4" x-data="{ showDetails: false }">
              <div class="flex justify-between items-center cursor-pointer" @click="showDetails = !showDetails">
                <div>
                  <span class="text-lg font-semibold">Order #{{ $order->id }}</span>
                  <span class="ml-4 text-gray-600">{{ $order->created_at->format('F j, Y') }}</span>
                </div>
                <div class="text-right">
                  <span class="text-green-700 font-medium">Total Paid: ${{ number_format($order->payment, 2) }}</span>
                  <span class="ml-4 text-red-600 font-medium">Discount: ${{ number_format($order->discount, 2) }}</span>
                  <span class="ml-4 text-orange-600 font-semibold">View Details</span>
                </div>
              </div>

              <!-- Order Details Section (Toggled) -->
              <ul class="mt-4 space-y-2" x-show="showDetails" x-collapse>
                @foreach ($order->order_detail as $detail)
                <li class="flex justify-between bg-gray-100 p-4 rounded-md shadow-sm">
                  <div class="flex items-center space-x-4">
                    <!-- Product Image -->
                    <img src="{{ asset('storage/' . $detail->product->image) }}" alt="Product Image"
                      class="w-16 h-16 object-cover rounded-lg">

                    <div>
                      <span class="block font-semibold text-gray-800">Product ID: {{ $detail->product_id }}</span>
                      <span>Quantity: {{ $detail->quantity }}</span>
                    </div>
                  </div>
                  <div class="text-right">
                    <span class="block font-semibold text-gray-700">Price:
                      ${{ number_format($detail->total_price, 2) }}</span>
                  </div>
                </li>
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </div>
  </div>

</x-app-layout>