<div class="min-h-screen w-full bg-gray-100">

    <h1 class="text-5xl font-bold text-center ">CATEGORIES</h1>

    <div class="flex justify-center items-center space-x-6 mt-14 mb-8 ">
        <!-- Food Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://img.freepik.com/free-vector/flat-adorable-pitbull-illustration_23-2148968106.jpg?t=st=1730189735~exp=1730193335~hmac=f8af6d5c559f929809494fa9178abccbeeea572dc1324a27ecd5ad4ea0f12053&w=740" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('category.show-product', 'Dog_Food')" :active="request()->is('category/Dog_Food')">
                    Dog Food
                </x-nav-link>
            </div>
        </div>

        <!-- Toy Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://img.freepik.com/free-vector/cute-cartoon-bear-top-hat-green-scarf-juggling_74855-91.jpg?t=st=1730189540~exp=1730193140~hmac=6fe383307c7040919021f51a815bd4a80cd1f617b9cf11233ef616b46d5e9061&w=740" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('category.show-product', 'Dog_Toys')" :active="request()->is('category/Dog_Toys')">
                    Dog Toys
                </x-nav-link>
            </div>
        </div>

        <!-- Item Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://images-ext-1.discordapp.net/external/DNmmTIh2WC-15tgiKFQNA-Xk3Yh1RoPn-Lwd8b_q_Nk/%3Ft%3Dst%3D1730188826~exp%3D1730192426~hmac%3D197ac8a8e4b79734f62c65098ee422b0c33e4a6315df46ae6d9353e6bfe0c95a%26w%3D740/https/img.freepik.com/free-vector/pet-grooming-concept-illustration_114360-19918.jpg?format=webp&width=662&height=662" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('category.show-product', 'Dog_Grooming')" :active="request()->is('category/Dog_Grooming')">
                    Dog Grooming
                </x-nav-link>
            </div>
        </div>
    </div>
</div>