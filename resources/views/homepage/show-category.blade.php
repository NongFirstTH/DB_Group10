<h1 class="text-5xl font-bold mt-16 text-center">CATEGORIES</h1>

<div class="flex justify-center items-center space-x-6 mt-14 mb-8">
        <!-- Food Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://s3-alpha-sig.figma.com/img/d87e/71e0/140e7d9f403a42678a9671f42283c14a?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=JwglvAhsvaskMJEOJalNvRKk191-Nq45aC5cakbGsfUtWgzkY5wkWn5YEj-Ou40UGMxVDMdXrjsj8d3wSTSNqBYTHis1tXCXuXQr~pqyIFp~ZdqaRkFN5WC3apdSz2JTFM11HDHd2J0EgxumNYKcKaa7S2ou3q4dYdujbNtvjqKwVjRuhZ7IOdDQyVs8gUxAo56O9hvt4tgFbEOaTHhMnkF2nkUemBNv002imnEkiMivjKQRWC0zXczcVa574f7Kgz4bWHbZ47r4VLIzaSng2~H8jh4ToOSwjaCUr6k4KmcahIeK~fz7CwEQxnqJ-fx1e8v2PmXhmY8-3GyJ~u7XGw__" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('homepage.show-product', 'Dog_Food')" :active="request()->is('category/Dog_Food')">
                            Dog Food
                </x-nav-link>
            </div>
        </div>

        <!-- Toy Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://s3-alpha-sig.figma.com/img/b9ec/1f66/96daf445c366a9b5a524ba59ff713220?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Rrk8uf0tkCXPZ4ga-HrYPY-zYkagkU83NPlFEYOsKF0VcebDWZplaJiCXCdOs5fX8rk5vK1aGhx5~TFQnvwu3gF0BsYBbmtrTmBaFh~sI9iXitHS10ehD01nary4wJCxDljd2Sgaku39Og4Wvmx2gyeUeqN1CFuhysA6HIYvyTwTipNtmUH0lVammUjH8HtVCpqs2atHP0P998Aq5ph4SCrkpUYdn9Aa~98xXn0kwFHKTqg33~44eYOd1IVirMw-srq78vWUJVwM5AJb5BSNRpnbBWBz~L93D4nL6f4x5VH08xsNj~0Xuk7aFU0KV~7NPXDGMpc~1ggEEWPCJFjkmw__" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('homepage.show-product', 'Dog_Toys')" :active="request()->is('category/Dog_Toys')">
                            Dog Toys
                </x-nav-link>
            </div>
        </div>

        <!-- Item Card -->
        <div class="bg-white rounded-lg shadow-lg max-w-xs">
            <img src="https://s3-alpha-sig.figma.com/img/8136/27d6/aaaf21470e39ae30232f72ea7053a4ba?Expires=1730073600&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EJ7GWazDgi57vs7FjH~4k9U0v6CqgmFNrCCYGqTUhjM2~to5VLYe91jTqy2yX3JrGxTAIFgZko1bQntYICii0u0mp9pgITd3UkmEx5eM4mZv8wBy9QvSW4Kiyx7MJ~YFJqg5hhJCFtauoHWRe0H8vIrGAMNS5SpTvYKwuhIcs8FrBT~dVlWZn7tMDr9RtRaVF8W4DbUv6JMIU7hnbh9YzJUo0l1~zczuge1HmtJ7WMwuoagBCMJTgKpAVWOt8WueY~eSyiqsUmPM19CSzyq5gKRECyd7eiG9HCw1mvZ85GTVaFURhkmxTmeFKbac23p4JSqLugoFNS5QJvtSeGA7oA__" class="rounded-t-lg">
            <div class="text-center p-4">
                <x-nav-link :href="route('homepage.show-product', 'Dog_Grooming')" :active="request()->is('category/Dog_Grooming')">
                            Dog Grooming
                </x-nav-link>
            </div>
        </div>
    </div>
    