<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cat;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CÓDIGO PARA BORRAR TODOS LOS ARCHIVOS QUE HAYAN EN LA TABLA
        //php artisan db:seed --class="CategorySeeder"
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('cats')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       
        $cats = [
            [
                'name' => 'Componentes',
                'user_id' => 1,
                'image' => '/images/categorias/componentes.webp',
            ],

            [
                'name' => 'Periféricos',
                'user_id' => 1,
                'image' => '/images/categorias/perifericos.webp',
            ],

            [
                'name' => 'Ordenadores',
                'user_id' => 1,
                'image' => '/images/categorias/ordenadores.webp',
            ],

            [
                'name' => 'Portátiles',
                'user_id' => 1,
                'image' => '/images/categorias/portаtiles.webp',
            ],

            [
                'name' => 'Móviles',
                'user_id' => 1,
                'image' => '/images/categorias/moviles.webp',
            ],

            [
                'name' => 'Tablets',
                'user_id' => 1,
                'image' => '/images/categorias/tablets.webp',
            ],

            [
                'name' => 'Sin categoría',
                'user_id' => 1,
                'image' => 'https://cdn-icons-png.flaticon.com/512/316/316313.png',
            ],
        ];

        Cat::insert($cats);

    }
}
