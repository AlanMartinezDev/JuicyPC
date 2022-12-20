<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
        

        // COMPONENTES
        $products = [
        [
            'name' => 'B550 GAMING GEN3',
            'price' => 136.98,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => '/images/1.webp'    
        ],
        [
            'name' => 'GeForce RTX 4090 GAMING OC 24GB GDDR6X',
            'price' => 3039,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Gigabyte',
            'image' => '/images/2.webp'     
        ],
        [
            'name' => 'i9-13900K 3 GHz Box',
            'price' => 766.98,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Intel Core',
            'image' => '/images/3.webp'      
        ],
        [
            'name' => 'FURY Beast RGB DDR4 3600 MHz 128GB 4x32GB CL18',
            'price' => 715.02,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Kingston',
            'image' => '/images/4.webp'      
        ],

        // PERIFÉRICOS
        [
            'name' => 'Optix MEG381CQR Plus 37.5" LED Rapid IPS UWQHD+ 175Hz G-Sync Ultimate Curvo',
            'price' => 2139,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => '/images/5.webp'      
        ],

        [
            'name' => 'BlackWidow V3 Pro Teclado Mecánico Inalámbrico Gaming Switch Green Layout USA',
            'price' => 257.34,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => '/images/6.webp'      
        ],

        [
            'name' => 'Basilisk V3 Pro Ratón Gaming Inalámbrico 30000 DPI Negro',
            'price' => 179.99,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => '/images/7.webp'      
        ],

        [
            'name' => 'A50 Wireless Auriculares Gaming Inalámbricos + Estación Base PC/Xbox One',
            'price' => 314.07,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Astro Gaming',
            'image' => '/images/8.webp'      
        ],

        // ORDENADORES
        [
            'name' => 'MAG META S 5SI-044XES AMD Ryzen 5 5600X/16GB/512GB SSD/GTX 1660 SUPER',
            'price' => 1099,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => '/images/9.webp'      
        ],

        [
            'name' => 'Victus 15L TG02-0018ns AMD Ryzen 5 5600G/16GB/512GB SSD/GTX 1650',
            'price' => 749,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'HP',
            'image' => '/images/10.webp'      
        ],

        [
            'name' => 'MAG META 5 5EDQ-1238XES AMD Ryzen 5 5600X/16GB/1TB SSD/RX6600XT',
            'price' => 1199.99,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => '/images/11.webp'      
        ],

        [
            'name' => 'IdeaCentre Gaming 5 17IAB7 Intel Core i5-12400F/16GB/512GB SSD/GTX1650 SUPER',
            'price' => 799,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => '/images/12.webp'      
        ],
        
        // PORTÁTILES
        [
            'name' => 'Nitro 5 AN517-41-R53X AMD Ryzen 7 5800H/32GB/1TB SSD/RTX3080/17.3"',
            'price' => 2199,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Acer',
            'image' => '/images/13.webp'      
        ],

        [
            'name' => 'Pulse GL76 12UEK-245XES Intel Core i9-12900H/32GB/1TB SSD/RTX 3060/17.3"',
            'price' => 1655,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => '/images/14.webp'      
        ],

        [
            'name' => 'IdeaPad 3 15ITL6 Intel Core i5-1135G7/8 GB/512GB SSD/15.6"',
            'price' => 649,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => '/images/15.webp'      
        ],

        [
            'name' => 'ROG Strix G15 G513RM-HQ012 AMD Ryzen 7 6800H/16GB/1TB SSD/RTX3060/15.6"',
            'price' => 1499,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'ASUS',
            'image' => '/images/16.webp'      
        ],

        // MÓVILES
        [
            'name' => 'Redmi Note 11 4/128GB Gris Grafito Libre',
            'price' => 220,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Xiaomi',
            'image' => '/images/17.webp'      
        ],

        [
            'name' => 'X4 Pro 5G 6/128GB Amarillo Libre',
            'price' => 586.99,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'POCO',
            'image' => '/images/18.webp'      
        ],

        [
            'name' => 'Galaxy M23 5G 4/128GB Verde Libre',
            'price' => 250,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Samsung',
            'image' => '/images/19.webp'      
        ],

        [
            'name' => 'GT2 8/128GB Negro Libre',
            'price' => 399,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Realme',
            'image' => '/images/20.webp'      
        ],

        // TABLETS
        [
            'name' => 'Tab P11 11" 2K 4/128GB WiFi Gris',
            'price' => 320,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => '/images/21.webp'      
        ],
        
        [
            'name' => 'Galaxy Tab S7 FE 128GB WIFI Negra',
            'price' => 750,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Samsung',
            'image' => '/images/22.webp'      
        ],
        
        [
            'name' => 'iPad Pro 2022 11" WiFi+Cellular 256GB Gris Espacial',
            'price' => 1309,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Apple',
            'image' => '/images/23.jpg'      
        ],
        
        [
            'name' => 'Yoga Tab 11 4/128GB 11" 2K Gris',
            'price' => 317,
            'user_id' => 1,  
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => '/images/24.webp'      
        ],
        
        ];
        
        Product::insert($products);
    }
}