<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
      [
        'username' => 'user1',
        'firstname' => 'John',
        'lastname' => 'Doe',
        'email' => 'john@example.com',
        'password' => bcrypt('password1'), // Example hashed password
        'phone_number' => '1234567890',
        'location' => 'Location1',
      ],
      [
        'username' => 'user2',
        'firstname' => 'Jane',
        'lastname' => 'Smith',
        'email' => 'jane@example.com',
        'password' => bcrypt('password2'),
        'phone_number' => '0987654321',
        'location' => 'Location2',
      ],
      [
        'username' => 'user3',
        'firstname' => 'Bob',
        'lastname' => 'Johnson',
        'email' => 'bob@example.com',
        'password' => bcrypt('password3'),
        'phone_number' => '5555555555',
        'location' => 'Location3',
      ],
      [
        'username' => 'user4',
        'firstname' => 'Alice',
        'lastname' => 'Williams',
        'email' => 'alice@example.com',
        'password' => bcrypt('password4'),
        'phone_number' => '4444444444',
        'location' => 'Location4',
      ],
      [
        'username' => 'user5',
        'firstname' => 'Charlie',
        'lastname' => 'Brown',
        'email' => 'charlie@example.com',
        'password' => bcrypt('password5'),
        'phone_number' => '3333333333',
        'location' => 'Location5',
      ],
    ]);
  }
}