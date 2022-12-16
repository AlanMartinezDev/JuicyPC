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
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1051/10517987/1747-msi-b550-gaming-gen3.jpg',
            ],

            [
                'name' => 'Periféricos',
                'user_id' => 1,
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1019/10197854/1898-msi-optix-meg381cqr-plus-375-led-rapid-ips-uwqhd-175hz-g-sync-ultimate-curvo.jpg',
            ],

            [
                'name' => 'Ordenadores',
                'user_id' => 1,
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1046/10460667/1110-msi-mag-meta-s-5si-044xes-amd-ryzen-5-5600x-16gb-512gb-ssd-gtx-1660-super.jpg',
            ],

            [
                'name' => 'Portátiles',
                'user_id' => 1,
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/38/387066/1123-acer-nitro-5-an517-41-r53x-amd-ryzen-7-5800h-16gb-1tb-ssd-rtx3080-173.jpg',
            ],

            [
                'name' => 'Móviles',
                'user_id' => 1,
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1002/10026495/1796-xiaomi-redmi-note-11-4-128gb-gris-grafito-libre.jpg',
            ],

            [
                'name' => 'Tablets',
                'user_id' => 1,
                'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1063/10632624/170-lenovo-tab-p11-11-2k-4-128gb-wifi-gris.jpg',
            ],
        ];

        Cat::insert($cats);

    }
}
