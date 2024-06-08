<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Listado de regiones de espoña
        $regions = [
            [
                "flag" => "flag_acoruña.png",
                "name" => "A Coruña (La Coruña)",
            ],
            [
                "flag" => "flag_alava.png",
                "name" => "Álava",
            ],
            [
                "flag" => "flag_albacete.png",
                "name" => "Albacete",
            ],
            [
                "flag" => "flag_alicante.png",
                "name" => "Alicante",
            ],
            [
                "flag" => "flag_almeria.png",
                "name" => "Almería",
            ],
            [
                "flag" => "flag_asturias.png",
                "name" => "Asturias",
            ],
            [
                "flag" => "flag_avila.png",
                "name" => "Ávila",
            ],
            [
                "flag" => "flag_badajoz.png",
                "name" => "Badajoz",
            ],
            [
                "flag" => "flag_baleares.png",
                "name" => "Baleares",
            ],
            [
                "flag" => "flag_barcelona.png",
                "name" => "Barcelona",
            ],
            [
                "flag" => "flag_burgos.png",
                "name" => "Burgos",
            ],
            [
                "flag" => "flag_caceres.png",
                "name" => "Cáceres",
            ],
            [
                "flag" => "flag_cadiz.png",
                "name" => "Cádiz",
            ],
            [
                "flag" => "flag_cantabria.png",
                "name" => "Cantabria",
            ],
            [
                "flag" => "flag_castellon.png",
                "name" => "Castellón",
            ],
            [
                "flag" => "flag_ciudadreal.png",
                "name" => "Ciudad Real",
            ],
            [
                "flag" => "flag_cordoba.png",
                "name" => "Córdoba",
            ],
            [
                "flag" => "flag_cuenca.png",
                "name" => "Cuenca",
            ],
            [
                "flag" => "flag_girona.png",
                "name" => "Girona",
            ],
            [
                "flag" => "flag_granada.png",
                "name" => "Granada",
            ],
            [
                "flag" => "flag_guadalajara.png",
                "name" => "Guadalajara",
            ],
            [
                "flag" => "flag_guipuzcoa.png",
                "name" => "Gipuzkoa",
            ],
            [
                "flag" => "flag_huelva.png",
                "name" => "Huelva",
            ],
            [
                "flag" => "flag_huesca.png",
                "name" => "Huesca",
            ],
            [
                "flag" => "flag_jaen.png",
                "name" => "Jaén",
            ],
            [
                "flag" => "flag_larioja.png",
                "name" => "La Rioja",
            ],
            [
                "flag" => "flag_laspalmas.png",
                "name" => "Las Palmas",
            ],
            [
                "flag" => "flag_leon.png",
                "name" => "León",
            ],
            [
                "flag" => "flag_lerida.png",
                "name" => "Lérida",
            ],
            [
                "flag" => "flag_lugo.png",
                "name" => "Lugo",
            ],
            [
                "flag" => "flag_madrid.png",
                "name" => "Madrid",
            ],
            [
                "flag" => "flag_malaga.png",
                "name" => "Málaga",
            ],
            [
                "flag" => "flag_murcia.png",
                "name" => "Murcia",
            ],
            [
                "flag" => "flag_navarra.png",
                "name" => "Navarra",
            ],
            [
                "flag" => "flag_ourense.png",
                "name" => "Ourense",
            ],
            [
                "flag" => "flag_palencia.png",
                "name" => "Palencia",
            ],
            [
                "flag" => "flag_pontevedra.png",
                "name" => "Pontevedra",
            ],
            [
                "flag" => "flag_salamanca.png",
                "name" => "Salamanca",
            ],
            [
                "flag" => "flag_segovia.png",
                "name" => "Segovia",
            ],
            [
                "flag" => "flag_sevilla.png",
                "name" => "Sevilla",
            ],
            [
                "flag" => "flag_soria.png",
                "name" => "Soria",
            ],
            [
                "flag" => "flag_tarragona.png",
                "name" => "Tarragona",
            ],
            [
                "flag" => "flag_santacruzdetenerife.png",
                "name" => "Santa Cruz de Tenerife",
            ],
            [
                "flag" => "flag_teruel.png",
                "name" => "Teruel",
            ],
            [
                "flag" => "flag_toledo.png",
                "name" => "Toledo",
            ],
            [
                "flag" => "flag_valencia.png",
                "name" => "Valencia",
            ],
            [
                "flag" => "flag_valladolid.png",
                "name" => "Valladolid",
            ],
            [
                "flag" => "flag_vizcaya.png",
                "name" => "Vizcaya",
            ],
            [
                "flag" => "flag_zamora.png",
                "name" => "Zamora",
            ],
            [
                "flag" => "flag_zaragoza.png",
                "name" => "Zaragoza",
            ],
        ];
        
        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
