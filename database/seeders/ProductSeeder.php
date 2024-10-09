<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'product_name' => 'Whimzees Stix – Medium',
                'description' => 'Reduces plaque & tartar, Grain free and gluten free, Freshens Breath, Easy to digest, Vegetarian & all natural',
                'price' => 60,
                'quantity' => 1000,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/03/Untitled-design-12-768x576.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Pet Munchies Grain Free Dog Treats – Duck Twists 80g',
                'description' => 'Quality Real Duck. This is a premium gourmet dental stick with succulent twists of 100% natural, human grade duck breast wrapped around a rawhide stick.',
                'price' => 120,
                'quantity' => 300,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/05/PU1938NET-768x576.jpg'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Pets Plus Grain Free Adult Dog Food – Chicken',
                'description' => 'Chicken, sweet potato & Herbs, Benefits: Ideal for dogs with grain intolerances and sensitivities, Helps produce smaller and firmer stools, Helps produce a good skin and coat condition',
                'price' => 150,
                'quantity' => 200,
                'image' => 'https://petsplus.ie/wp-content/uploads/2021/12/Untitled-design-67-768x768.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Burns Wet Dog Food Lamb 6 x 395g Pouches',
                'description' => 'Hearty Lamb with Carrots & Organic Brown Rice Product benefits',
                'price' => 200,
                'quantity' => 250,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/03/Images-49-768x576.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Burns Wet Dog Food – Chicken – 150g x 12',
                'description' => 'Made with natural ingredients Contains organic brown rice Contains organic chicken Hypoallergenic Suitable for dogs with sensitive skin Suitable for dogs with sensitive digestion Highly digestible Single Protein Source',
                'price' => 200,
                'quantity' => 250,
                'image' => 'https://petsplus.ie/wp-content/uploads/2021/07/Images-48-768x576.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Burns Sensitive Dog Food – Adult – Duck',
                'description' => 'Burns Sensitive Dog Food in Duck & Brown Rice is made with simple, wholesome ingredients designed for dogs to thrive. Hypoallergenic; delicious and nutritious.',
                'price' => 300,
                'quantity' => 280,
                'image' => 'https://petsplus.ie/wp-content/uploads/2023/06/001.-Hero-Image-11-768x768.jpg'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Royal Canin Maxi Adult Pouch 140g',
                'description' => 'Royal Canin Maxi Adult Pouch 140g complete feed for dogs – for adult large breed dogs (from 26 to 44 kg) – from 15 months to 8 years old',
                'price' => 90,
                'quantity' => 100,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/03/shn18-maxi-adult-n-pouch-140.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Forthglade Grain Free Wet Dog Food Duck 395g',
                'description' => 'FORTHGLADE COMPLETE GRAIN FREE DUCK POTATO & VEG DOG FOOD',
                'price' => 150,
                'quantity' => 200,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/08/OI_395g_GF_Duck_ADT_FRONT_500x.webp'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Royal Canin Mini Adult Pouch 85g',
                'description' => 'Complete feed for dogs – for adult small breed dogs (from 1 to 10 kg) – from 10 months to 12 years old',
                'price' => 55,
                'quantity' => 200,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/03/shn18-mini-adult-s-pouch-85.png'
            ],
            [
                'category_id' => 1,
                'product_name' => 'Pet Munchies Sushi Dog Training Treats 50g',
                'description' => 'Made with 100% Natural: Quality Real Fish & Chicken Breast. These premium gourmet tasty bites, made from the finest ingredients, make the perfect training aid.',
                'price' => 190,
                'quantity' => 300,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/06/SushiTrainingtreats-768x576.jpg'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Suction Tug Dog Toy',
                'description' => 'Give your loyal four-legged friend a challenge with this toy! The suction cup provides hours of fun and is perfect for keeping your dog entertained. Made from strong and flexible TPR material, it’s gentle on their teeth. Easy to attach to the floor.',
                'price' => 320,
                'quantity' => 120,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/11/520465_V_01.webp'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Pet Munchies Sushi Dog Training Treats 50g',
                'description' => 'Mentally stimulating toy; offering enrichment by helping satisfy dogs instinctual needs Unpredictable bounce for games of fetch Recommended by veterinarians and trainers worldwide Natural rubber',
                'price' => 340,
                'quantity' => 150,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/03/T1_1_1000x1000.jpeg'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Kong Air Tennis Balls – XS – 3PK',
                'description' => 'Fetch toy for healthy; active play Non-abrasive KONG Tennis material; softer on teeth Squeaker entices play',
                'price' => 185,
                'quantity' => 80,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/05/AST5_SqueakAir_Balls_XS-20200610175745-20200610175805-1000x1000-1-768x768.jpeg'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Small Bite Plush Penguin Puppy Toy',
                'description' => 'Soft, Squeaker, approx 21cm',
                'price' => 290,
                'quantity' => 110,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/06/unnamed-file-768x768.jpeg'
            ],
            [
                'category_id' => 2,
                'product_name' => 'Small Bite Octopus Puppy Toy 19cm',
                'description' => 'With ropey legs, Perfect for cuddling and comfort, Designed for puppies and small dogs',
                'price' => 295,
                'quantity' => 130,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/08/small-bite-octupus-768x576.jpg'
            ],
            [
                'category_id' => 2,
                'product_name' => 'SKong Jumbo Dog Toy – Comfort',
                'description' => 'XL plush toy for extra-large fun, Crinkle sounds extend engagement, Squeakers in body and beak entice play',
                'price' => 375,
                'quantity' => 90,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/04/Comforts_Jumbo_Duck_Assorted-20190506210738-20190506210749-1000x1000-1-768x768.jpeg'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Ancol Degradable Dog Poo Bags',
                'description' => 'Biodegradable, 60 bags, 4 rolls, tie handles',
                'price' => 165,
                'quantity' => 80,
                'image' => 'https://petsplus.ie/wp-content/uploads/2022/09/80231-1-768x576.jpg'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Pet Food Storage Bin 46L',
                'description' => 'Keep your pet\'s food fresh with this plastic Pet food storage bin with clip lid suitable to store your pet’s food.',
                'price' => 520,
                'quantity' => 175,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/10/TOM-bidone-silver-PF70500.jpg'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Universal Dog Seat Belt Restraint',
                'description' => 'Keep your dog safe and secure whilst travelling. Can be used with harness, Securing your pup is now a requirement',
                'price' => 245,
                'quantity' => 130,
                'image' => 'https://petsplus.ie/wp-content/uploads/2021/04/10-off-ancol-coats-768x576.png'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Nobby Dog Snuffle Mat',
                'description' => 'Anti-slip, 100% polyester, 30°C machine wash, plastic plate keeps the mat stable while playing',
                'price' => 980,
                'quantity' => 100,
                'image' => 'https://petsplus.ie/wp-content/uploads/2021/02/Images-83-768x576.png'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Poop Scooper',
                'description' => 'Help for removing excrement, aluminium handle',
                'price' => 735,
                'quantity' => 120,
                'image' => 'https://petsplus.ie/wp-content/uploads/2020/03/72754-768x584.jpg'
            ],
            [
                'category_id' => 3,
                'product_name' => 'Ergo Raised Bowl and Feeder 18cm',
                'description' => 'The Ergo Feeder is a raised dog feeder and drinker which includes 2 removable stainless-steel bowls.',
                'price' => 935,
                'quantity' => 150,
                'image' => 'https://petsplus.ie/wp-content/uploads/2019/03/ErgoFdr.jpeg'
            ],
        ]);
    }
}