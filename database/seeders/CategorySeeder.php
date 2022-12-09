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
            ],

            [
                'name' => 'Periféricos',
            ],

            [
                'name' => 'Ordenadores',
            ],

            [
                'name' => 'Portátiles',
            ],

            [
                'name' => 'Móviles',
            ],

            [
                'name' => 'Tablets',
            ],
        ];

        Cat::insert($cats);

    }
}
