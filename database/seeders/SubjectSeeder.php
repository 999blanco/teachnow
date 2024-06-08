<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                "slug" => Str::slug("Español"),
                "name" => "Español",
                "image" => "espana.png",
            ],
            [
                "slug" => Str::slug("Inglés (Británico)"),
                "name" => "Inglés (Británico)",
                "image" => "reinounido.png",
            ],
            [
                "slug" => Str::slug("Inglés (Americano)"),
                "name" => "Inglés (Americano)",
                "image" => "estadosunidos.png",
            ],
            [
                "slug" => Str::slug("Francés"),
                "name" => "Francés",
                "image" => "francia.png",
            ],
            [
                "slug" => Str::slug("Alemán"),
                "name" => "Alemán",
                "image" => "alemania.png",
            ],
            [
                "slug" => Str::slug("Italiano"),
                "name" => "Italiano",
                "image" => "italia.png",
            ],
            [
                "slug" => Str::slug("Portugués"),
                "name" => "Portugués",
                "image" => "portugal.png",
            ],
            [
                "slug" => Str::slug("Chino"),
                "name" => "Chino (Mandarín)",
                "image" => "china.png",
            ],
            [
                "slug" => Str::slug("Japonés"),
                "name" => "Japonés",
                "image" => "japon.png",
            ],
            [
                "slug" => Str::slug("Árabe"),
                "name" => "Árabe",
                "image" => "marruecos.png",
            ],
            [
                "slug" => Str::slug("HTML5"),
                "name" => "HTML5",
                "image" => "html5.png",
            ],
            [
                "slug" => Str::slug("Javascript"),
                "name" => "Javascript",
                "image" => "javascript.png",
            ],
            [
                "slug" => Str::slug("CSS3"),
                "name" => "CSS3",
                "image" => "css3.png",
            ],
            [
                "slug" => Str::slug("SASS"),
                "name" => "SASS",
                "image" => "sass.png",
            ],
            [
                "slug" => Str::slug("Typescript"),
                "name" => "Typescript",
                "image" => "typescript.png",
            ],
            [
                "slug" => Str::slug("Laravel"),
                "name" => "Laravel",
                "image" => "laravel.png",
            ],
            [
                "slug" => Str::slug("Desarrollo web"),
                "name" => "Desarrollo web",
                "image" => "desarrolloweb.png",
            ],
            [
                "slug" => Str::slug("SEO"),
                "name" => "SEO",
                "image" => "seo.png",
            ],
            [
                "slug" => Str::slug("Ciberseguridad"),
                "name" => "Ciberseguridad",
                "image" => "ciberseguridad.png",
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
