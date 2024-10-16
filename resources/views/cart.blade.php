<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="mystyle.css">
</head>


<style>
.table_component {
  overflow: auto;
  width: 100%;
}

.table_component table {
  border: 5px solid #dededf;
  height: 100%;
  width: 100%;
  table-layout: fixed;
  border-collapse: collapse;
  border-spacing: 1px;
  text-align center;
}

.table_component caption {
  caption-side: top;
  text-align: center;
}

.table_component th {
  border: 1px solid #dededf;
  background-color: #eceff1;
  color: #000000;
  padding: 5px;
}

.table_component td {
  border: 5px solid #dededf;
  background-color: #ffffff;
  color: #000000;
  padding: 5px;
}
</style>

<div class="table_component" role="region" tabindex="0">
  <table>
    <caption>
      <p>Username: {{$user_name}} | Your Cart have {{$cartProducts->count()}} items</p>
    </caption>
    <thead>
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cartProducts as $product)
      <tr>
        <td><img src={{ $product->image }} style="object-fit:contain;
      width:200px;
      height:300px;
      border: solid 1px #CCC" /></td>
        <td>{{ $product->product_name}}</td>
        <td>{{ $product->price}}</td>
        <td>{{ $product->quantity}}</td>
        <td>{{ $product->total_amount}}</td>
      </tr>
      @endforeach
    </tbody>

  </table><button class="w3-button w3-green">Checkout</button>

</html>