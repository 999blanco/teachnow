<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /*  User::create([
            "slug" => Str::slug("David Blanco"),
            "name" => "David Blanco",
            "email" => "david@gmail.com",
            "password" => bcrypt("david"),
            "profile-banner" => "default.png",
            "avatar" => "default.png",
            "phone" => "123456789",
            "title" => "Ingeniero de Software",
            "city" => "Barcelona",
            "region_id" => Region::inRandomOrder()->first()->id,
            "country" => "España",
            "about_me" => "Soy un ingeniero de software con 10 años de experiencia en la industria. He trabajado en varias empresas y tengo mucha experiencia en el campo. Me apasiona enseñar y me encanta compartir mis conocimientos con los demás.",
            "social" => json_encode([
                "instagram" => "davidblanco",
                "linkedin" => "davidblanco",
                "github" => "davidblanco",
            ]),
            "education" => json_encode([
                [
                    "degree" => "Informática",
                    "school" => "Universidad de Madrid",
                    "year" => 2010,
                ],
                [
                    "degree" => "Máster en Ingeniería de Software",
                    "school" => "Universidad de Madrid",
                    "year" => 2012,
                ]
            ]),
            "price_per_hour" => 10.00,
        ])->assignRole('Teacher');


        User::create([
            "slug" => Str::slug("Sergio Abrodes"),
            "name" => "Sergio Abrodes",
            "email" => "sergio@gmail.com",
            "password" => bcrypt("sergio"),
            "profile-banner" => "default.png",
            "avatar" => "default.png",
            "phone" => "123456789",
            "title" => "Ingeniero de Software",
            "city" => "Madrid",
            "region_id" => Region::inRandomOrder()->first()->id,
            "country" => "España",
            "about_me" => "Soy un ingeniero de software con 10 años de experiencia en la industria. He trabajado en varias empresas y tengo mucha experiencia en el campo. Me apasiona enseñar y me encanta compartir mis conocimientos con los demás.",
            "social" => json_encode([
                "instagram" => "sergioabrodes",
                "linkedin" => "sergioabrodes",
                "github" => "sergioabrodes",
            ]),
            "education" => json_encode([
                [
                    "degree" => "Informática",
                    "school" => "Universidad de Madrid",
                    "year" => 2010,
                ],
                [
                    "degree" => "Máster en Ingeniería de Software",
                    "school" => "Universidad de Madrid",
                    "year" => 2012,
                ]
            ]),
            "price_per_hour" => 10.00,
        ])->assignRole('Teacher'); */

        User::create([
            "name" => "Administrador",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin"),
        ])->assignRole('Administrator');
    }
}
