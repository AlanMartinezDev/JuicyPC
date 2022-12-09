<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CÓDIGO PARA BORRAR TODOS LOS ARCHIVOS QUE HAYAN EN LA TABLA
        //php artisan db:seed --class="CategoryProductSeeder"
        /*
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('product_cat')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       */
      
        DB::table('product_cat')->insert([
            'product_id' => '1',
            'cat_id' => '1'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '2',
            'cat_id' => '1'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '3',
            'cat_id' => '1'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '4',
            'cat_id' => '1'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '5',
            'cat_id' => '2'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '6',
            'cat_id' => '2'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '7',
            'cat_id' => '2'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '8',
            'cat_id' => '2'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '9',
            'cat_id' => '3'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '10',
            'cat_id' => '3'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '11',
            'cat_id' => '3'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '12',
            'cat_id' => '3'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '13',
            'cat_id' => '4'
        ]);
        
        DB::table('product_cat')->insert([
            'product_id' => '14',
            'cat_id' => '4'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '15',
            'cat_id' => '4'
        ]);
        
        DB::table('product_cat')->insert([
            'product_id' => '16',
            'cat_id' => '4'
        ]);
        
        DB::table('product_cat')->insert([
            'product_id' => '17',
            'cat_id' => '5'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '18',
            'cat_id' => '5'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '19',
            'cat_id' => '5'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '20',
            'cat_id' => '5'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '21',
            'cat_id' => '6'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '22',
            'cat_id' => '6'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '23',
            'cat_id' => '6'
        ]);

        DB::table('product_cat')->insert([
            'product_id' => '24',
            'cat_id' => '6'
        ]);
    }
}
