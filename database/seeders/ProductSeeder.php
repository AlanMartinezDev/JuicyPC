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
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       

        // COMPONENTES
        DB::table('products')->insert([
            'name' => 'B550 GAMING GEN3',
            'price' => 136.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1051/10517987/1747-msi-b550-gaming-gen3.jpg'      
        ]);
        
        DB::table('products')->insert([
            'name' => 'GeForce RTX 4090 GAMING OC 24GB GDDR6X',
            'price' => 3039,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Gigabyte',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1058/10589923/1624-gigabyte-geforce-rtx-4090-gaming-oc-24gb-gddr6x.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'i9-13900K 3 GHz Box',
            'price' => 766.98,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Intel Core',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1057/10573120/1643-intel-core-i9-13900k-3-ghz-box.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'FURY Beast RGB DDR4 3600 MHz 128GB 4x32GB CL18',
            'price' => 715.02,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Kingston',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/43/432801/1336-kingston-fury-beast-rgb-ddr4-3600-mhz-128gb-4x32gb-cl18.jpg'      
        ]);

        // PERIFÉRICOS
        DB::table('products')->insert([
            'name' => 'Optix MEG381CQR Plus 37.5" LED Rapid IPS UWQHD+ 175Hz G-Sync Ultimate Curvo',
            'price' => 2139,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1019/10197854/1898-msi-optix-meg381cqr-plus-375-led-rapid-ips-uwqhd-175hz-g-sync-ultimate-curvo.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'BlackWidow V3 Pro Teclado Mecánico Inalámbrico Gaming Switch Green Layout USA',
            'price' => 257.34,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/36/361533/1456-razer-blackwidow-v3-pro-teclado-mecanico-inalambrico-gaming-switch-green-layout-usa.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Basilisk V3 Pro Ratón Gaming Inalámbrico 30000 DPI Negro',
            'price' => 179.99,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Razer',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1064/10643482/157-razer-basilisk-v3-pro-raton-gaming-inalambrico-30000-dpi-negro.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'A50 Wireless Auriculares Gaming Inalámbricos + Estación Base PC/Xbox One',
            'price' => 314.07,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Astro Gaming',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/24/245429/asdqwd.jpg'      
        ]);

        // ORDENADORES
        DB::table('products')->insert([
            'name' => 'MAG META S 5SI-044XES AMD Ryzen 5 5600X/16GB/512GB SSD/GTX 1660 SUPER',
            'price' => 1099,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1046/10460667/1110-msi-mag-meta-s-5si-044xes-amd-ryzen-5-5600x-16gb-512gb-ssd-gtx-1660-super.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Victus 15L TG02-0018ns AMD Ryzen 5 5600G/16GB/512GB SSD/GTX 1650',
            'price' => 749,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'HP',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1036/10364751/1140-hp-victus-15l-tg02-0018ns-amd-ryzen-5-5600g-16gb-512gb-ssd-gtx-1650.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'MAG META 5 5EDQ-1238XES AMD Ryzen 5 5600X/16GB/1TB SSD/RX6600XT',
            'price' => 1199.99,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1017/10170894/133-msi-mag-meta-5-5edq-1238xes-amd-ryzen-5-5600x-16gb-1tb-ssd-rx6600xt.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'IdeaCentre Gaming 5 17IAB7 Intel Core i5-12400F/16GB/512GB SSD/GTX1650 SUPER',
            'price' => 799,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1026/10262623/1576-lenovo-ideacentre-gaming-5-17iab7-intel-core-i5-12400f-16gb-512gb-ssd-gtx1650-super.jpg'      
        ]);
        
        // PORTÁTILES
        DB::table('products')->insert([
            'name' => 'Nitro 5 AN517-41-R53X AMD Ryzen 7 5800H/32GB/1TB SSD/RTX3080/17.3"',
            'price' => 2199,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Acer',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/38/387066/1123-acer-nitro-5-an517-41-r53x-amd-ryzen-7-5800h-16gb-1tb-ssd-rtx3080-173.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Pulse GL76 12UEK-245XES Intel Core i9-12900H/32GB/1TB SSD/RTX 3060/17.3"',
            'price' => 1655,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'MSI',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1056/10569561/1423-msi-pulse-gl76-12uek-245xes-intel-core-i9-12900h-32gb-1tb-ssd-rtx-3060-173.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'IdeaPad 3 15ITL6 Intel Core i5-1135G7/8 GB/512GB SSD/15.6"',
            'price' => 649,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Lenovo',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1010/10101735/1383-lenovo-ideapad-3-15itl6-intel-core-i5-1135g7-8-gb-512gb-ssd-156-review.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'ROG Strix G15 G513RM-HQ012 AMD Ryzen 7 6800H/16GB/1TB SSD/RTX3060/15.6"',
            'price' => 1499,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'ASUS',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1031/10317957/1580-asus-rog-strix-g15-g513rm-hq012-amd-ryzen-9-6800h-16gb-1tb-ssd-rtx3060-156.jpg'      
        ]);

        // MÓVILES
        DB::table('products')->insert([
            'name' => 'Redmi Note 11 4/128GB Gris Grafito Libre',
            'price' => 220,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Xiaomi',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1002/10026495/1796-xiaomi-redmi-note-11-4-128gb-gris-grafito-libre.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'X4 Pro 5G 6/128GB Amarillo Libre',
            'price' => 586.99,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'POCO',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1009/10096746/1608-poco-x4-pro-5g-6-128gb-amarillo-libre-comprar.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'Galaxy M23 5G 4/128GB Verde Libre',
            'price' => 250,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Samsung',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1018/10186129/1745-samsung-galaxy-m23-5g-4-128gb-verde-libre.jpg'      
        ]);

        DB::table('products')->insert([
            'name' => 'GT2 8/128GB Negro Libre',
            'price' => 399,
            'description' => 'Esto es una descripción de producto en la tienda JuicyPC creada por los seeders. Esta descripción puede ser editada y eliminada posteriormente por un administrador.',
            'brand' => 'Realme',
            'image' => 'https://thumb.pccomponentes.com/w-530-530/articles/1019/10194275/1291-realme-gt2-8-128gb-negro-libre.jpg'      
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
