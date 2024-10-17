<div class="bg-white shadow-md rounded-lg p-6">
  <h3 class="text-xl font-semibold mb-6" style="color: #ED7D31;">My Orders</h3>
  @props(['orders'])

  @if($orders->isEmpty())
  <p class="text-gray-800">You have no recent orders.</p>
  <p class="text-gray-600 mt-2">Browse our store and place your first order!</p>
  @else
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach($orders as $order)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $order->O_Description }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $order->Total }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $order->Date_time }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>