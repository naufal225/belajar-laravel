<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "Budi",
            "email" => "budi123@gmail.com",
            "gender" => "male",
            "username" => "budi123",
            "hobby" => json_encode(["membaca"]),
            "telp" => "081295520921",
            "city" => "Bekasi",
            "reason" => "ngapain ge",
            "is_admin" => true,
            "password" => bcrypt("password")
        ]);
    }
}
