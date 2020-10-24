<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '0812345678',
            'address' => 'jl. cabe 1 rt 04 rw 04, no .19'
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => "user{$i}@gmail.com",
                'role' => 'user',
                'password' => Hash::make('12345678'),
                'phone' => $faker->PhoneNumber(),
                'address' => $faker->address
            ]);
        }
    }
}
