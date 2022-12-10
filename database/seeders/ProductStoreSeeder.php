<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('product_store')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       
      
        DB::table('product_store')->insert([
            'product_id' => '1',
            'store_id' => '1',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '2',
            'store_id' => '1',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '3',
            'store_id' => '1',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '4',
            'store_id' => '1',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '5',
            'store_id' => '1',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '6',
            'store_id' => '1',
            
        ]);

        
//------------------------------        Almacen 2       ---------------------------------------------

        DB::table('product_store')->insert([
            'product_id' => '7',
            'store_id' => '2',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '8',
            'store_id' => '2',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '9',
            'store_id' => '2',
            
        ]);
        
        DB::table('product_store')->insert([
            'product_id' => '10',
            'store_id' => '2',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '11',
            'store_id' => '2',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '12',
            'store_id' => '2',
            
        ]);
        

 //------------------------------        Almacen 3        ---------------------------------------------       


        
        DB::table('product_store')->insert([
            'product_id' => '13',
            'store_id' => '3',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '14',
            'store_id' => '3',
            
        ]);
        
        DB::table('product_store')->insert([
            'product_id' => '15',
            'store_id' => '3',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '16',
            'store_id' => '3',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '17',
            'store_id' => '3',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '18',
            'store_id' => '3',
            
        ]);


//------------------------------        Almacen 4        ---------------------------------------------


        DB::table('product_store')->insert([
            'product_id' => '19',
            'store_id' => '4',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '20',
            'store_id' => '4',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '21',
            'store_id' => '4',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '22',
            'store_id' => '4',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '23',
            'store_id' => '4',
            
        ]);

        DB::table('product_store')->insert([
            'product_id' => '24',
            'store_id' => '4',
            
        ]);
    }
}
