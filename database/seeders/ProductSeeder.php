<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CÓDIGO PARA BORRAR TODOS LOS ARCHIVOS QUE HAYAN EN LA TABLA
        //php artisan db:seed --class="ProductSeeder"
        /*
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       */

        // COMPONENTES
        DB::table('products')->insert([
            'name' => 'B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);
        
        DB::table('products')->insert([
            'name' => 'GeForce RTX 4090 GAMING OC 24GB GDDR6X',
            'price' => 3039.03,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Gigabyte',
            'image' => 'https://i.imgur.com/lhkPKvc.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'i9-13900K 3 GHz Box',
            'price' => 753.04,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Intel Core',
            'image' => 'https://i.imgur.com/N0EckDs.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'FURY Beast RGB DDR4 3600 MHz 128GB 4x32GB CL18',
            'price' => 715.02,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Kingston',
            'image' => 'https://i.imgur.com/supu6Q4.png'      
        ]);

        // PERIFÉRICOS
        DB::table('products')->insert([
            'name' => 'Optix MEG381CQR Plus 37.5" LED Rapid IPS UWQHD+ 175Hz G-Sync Ultimate Curvo',
            'price' => 2139.03,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/M2OE9ta.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'BlackWidow V3 Pro Teclado Mecánico Inalámbrico Gaming Switch Green Layout USA',
            'price' => 257.34,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => 'https://i.imgur.com/vXheZY0.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'Basilisk V3 Pro Ratón Gaming Inalámbrico 30000 DPI Negro',
            'price' => 179.99,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => 'https://i.imgur.com/Ej0TIum.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'A50 Wireless Auriculares Gaming Inalámbricos + Estación Base PC/Xbox One',
            'price' => 314.07,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Astro Gaming',
            'image' => 'https://i.imgur.com/MR1PdKW.png'      
        ]);

        // ORDENADORES
        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);
        
        // PORTÁTILES
        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        // MÓVILES
        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        DB::table('products')->insert([
            'name' => 'MSI B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://i.imgur.com/LpvASmn.png'      
        ]);

        // TABLETS
        DB::table('products')->insert([
            'name' => 'Tab P11 11" 2K 4/128GB WiFi Gris',
            'price' => 320,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1063/10632624/170-lenovo-tab-p11-11-2k-4-128gb-wifi-gris.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Galaxy Tab S7 FE 128GB WIFI Negra',
            'price' => 750,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Samsung',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/40/408794/1665-samsung-galaxy-tab-s7-fe-128gb-wifi-negra.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'iPad Pro 2022 11" WiFi+Cellular 256GB Gris Espacial',
            'price' => 1309,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Apple',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1063/10635756/1694-apple-ipad-pro-2022-11-wifi-cellular-256gb-gris-espacial.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Yoga Tab 11 4/128GB 11" 2K Gris',
            'price' => 317,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1063/10633682/1862-lenovo-yoga-tab-11-4-128gb-11-2k-gris.jpg'      
        ]);
    }
}
