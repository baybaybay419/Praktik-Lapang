<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FirstPartySeeder::class,
            SecondPartySeeder::class,
            KabupatenKotaSeeder::class,
            KementrianSeeder::class,
            ProvinsiSeeder::class
        ]);

        User::create([
            'name' => "Abdullah Akbar",
            'email' => "abay@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("123123123"), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
