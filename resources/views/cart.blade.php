<!-- cart.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Your Cart ({{ $cart->count() }} items)</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cart as $item)
      <tr>
        <td>
          <img src="{{ $item->image }}" alt="item image" style="width: 50px;">
          {{ $item->name }}
        </td>
        <td>${{ number_format($item->price, 2) }}</td>
        <td>
          <form action="{{ route('cart.update', $item->id) }}" method="POST">
            @csrf
            <div class="input-group">
              <button type="submit" class="btn btn-outline-secondary" name="action" value="decrement">-</button>
              <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control text-center"
                style="width: 40px;" readonly>
              <button type="submit" class="btn btn-outline-secondary" name="action" value="increment">+</button>
            </div>
          </form>
        </td>
        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-right">
    <h3>Total: ${{ number_format($cart->sum('total'), 2) }}</h3>
  </div>
</div>
@endsection