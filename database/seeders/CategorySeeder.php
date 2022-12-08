<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
       

        DB::table('cats')->insert([
            'name' => 'Componentes',
        ]);

        DB::table('cats')->insert([
            'name' => 'Periféricos',
        ]);

        DB::table('cats')->insert([
            'name' => 'Ordenadores',
        ]);

        DB::table('cats')->insert([
            'name' => 'Portátiles',
        ]);

        DB::table('cats')->insert([
            'name' => 'Móviles',
        ]);

        DB::table('cats')->insert([
            'name' => 'Tablets',
        ]);
    }
}
