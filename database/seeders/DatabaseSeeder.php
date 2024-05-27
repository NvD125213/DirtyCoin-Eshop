<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            [            
                'first_name' => 'Ngô',
                'last_name' => 'Đức',
                'email' => 'ilovejapansong@gmail.com',
                'password' => Hash::make('123456'),          
            ]
        ]);

    }
}
