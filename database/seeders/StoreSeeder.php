<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //php artisan db:seed --class="StoreSeeder"
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('stores')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       
      
        $stores = [
            [
                'name' => 'Almacén 1',
                'address' => 'Avenida Cuba',
                'contact' => 'store1@juicypc.com',
                'user_id' => 1,
            ],

            [
                'name' => 'Almacén 2',
                'address' => 'Rambla Manuel Peralta',
                'contact' => 'store2@juicypc.com',
                'user_id' => 1,
            ],

            [
                'name' => 'Almacén 3',
                'address' => 'Avenida Pablo Vallecas',
                'contact' => 'store3@juicypc.com',
                'user_id' => 1,
            ],

            [
                'name' => 'Almacén 4',
                'address' => 'La Cañada Real',
                'contact' => 'store4@juicypc.com',
                'user_id' => 1,
            ],
            
            
        ];

        Store::insert($stores);
    }
}
