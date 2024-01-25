<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=> "admin",
            "email"=> "admin@gmail.com",
            "gender"=> 'male',
            'address'=> 'Myingyan',
            'phone'=> '09796788834',
        'password'=> Hash::make("admin2004")
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Kaung Khant Soe',
        //     'email' => 'kaungkhants892@gmail.com',
        //     'password'=> Hash::make('helloHaHa'),
        // ]);
    }
}
