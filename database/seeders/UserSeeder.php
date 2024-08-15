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
            "category_id" => 1,
            "user_id" => 1,
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "excerpt" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, repudiandae error doloremque earum architecto exercitationem omnis. Ab numquam facilis, assumenda vero quidem mollitia accusamus est culpa deserunt sunt nam.",
            "body" => "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, repudiandae error doloremque earum architecto exercitationem omnis. Ab numquam facilis, assumenda vero quidem mollitia accusamus est culpa deserunt sunt nam. Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p><p>Obcaecati, ullam natus. Vel quos ratione mollitia numquam recusandae harum, voluptates, vitae similique labore porro eius repellat consectetur rerum libero, laborum repellendus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, dolorem. Ipsa minus aspernatur expedita explicabo, earum, in fugit ratione nulla recusandae a quod?</p>"
        ]);
    }
}
