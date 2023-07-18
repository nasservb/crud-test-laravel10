<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => Hash::make('12345678'),
         ]);

         \App\Domains\Customer\Models\Customer::factory()->create([
             'first_name' => 'Test User',
             'last_name' => 'Test User',
             'date_of_birth'=>date('Y-m-d'),
             'phone_number' => '+989189151266',
             'email' => 'test@example.com',
             'bank_account_number' => '5453521-5532-23',
         ]);
    }
}
