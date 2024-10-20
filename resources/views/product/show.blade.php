<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    
                    <!-- Product Image -->
                    <div class="w-1/2">
                    <img src="{{  $product->image }}" alt="{{ $product->name }}">


                    </div>
                    
                    <!-- Product Details -->
                    <div class="w-1/2 pl-8">
                        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                        <div class="text-gray-600 text-lg mt-4 mb-6">
                            {{ $product->description }}
                        </div>

                        <div class="text-2xl font-semibold text-gray-900">
                            Price: ฿{{ number_format($product->price, 2) }}
                        </div>

                        <!-- Stock Availability -->
                <div class="text-green-600 text-lg mt-2">
                            In Stock: {{ $product->quantity }} units
                    </div>

<?php
// สมมติว่า $product->quantity มาจากการดึงข้อมูลจากฐานข้อมูล
$stock = $product->quantity;
?>

<!-- Add to Cart Button -->
<div class="mt-6">
    Quantity:
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        
        <!-- ฟิลด์สำหรับเลือกจำนวนสินค้าที่ต้องการเพิ่มในตะกร้า -->
        <input type="number" name="quantity" id="quantity" value="0" min="0" max="{{ $product->quantity }}" 
    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
    oninput="this.value = this.value.replace(/^0+/, '')">



        <!-- Button positioned below the quantity field -->
        <div class="mt-2">
        <button id="addToCartBtn" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 mt-4"
            <?php echo $stock == 0 ? 'disabled' : ''; ?>>
            Add to Cart
        </button>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stock = <?php echo $stock; ?>;
        const addToCartBtn = document.getElementById('addToCartBtn');
        const quantityInput = document.getElementById('quantity');

        // ตรวจสอบว่าจำนวนสินค้าหมดสต็อกหรือไม่ ถ้าหมดให้ปิดการใช้งานปุ่ม
        if (stock === 0) {
            addToCartBtn.disabled = true;
            addToCartBtn.classList.add('cursor-not-allowed', 'opacity-50'); // เพิ่มสไตล์ปิดการใช้งานให้ชัดเจน
        }

        // ตรวจสอบจำนวนที่กรอกใน input
        quantityInput.addEventListener('input', function (e) {
            let value = parseInt(e.target.value);
            if (isNaN(value) || value < 0) {
                e.target.value = 0;
            } else if (value > stock) {
                e.target.value = stock;
            }
        });
    });
</script>

<script>
    document.getElementById('addToCartBtn').addEventListener('click', function(e) {
        e.preventDefault(); // ป้องกันไม่ให้รีเฟรชหน้า

        let product_id = document.querySelector('input[name="product_id"]').value;
        let quantity = document.querySelector('input[name="quantity"]').value;
        let price = document.querySelector('input[name="price"]').value;
        let token = document.querySelector('input[name="_token"]').value;

        fetch("{{ route('cart.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                product_id: product_id,
                quantity: quantity,
                price: price
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                // อัปเดตจำนวนสินค้าในตะกร้า (สามารถสร้าง element แสดงจำนวนได้)
                document.getElementById('cartItemCount').innerText = data.cartItemCount;
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
