<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
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
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
       
        $users = [
            [
                'name' => 'Eric',
                'username' => 'erga916',
                'email' => 'eric@juicypc.com',
                'address' => 'La Cañada Real Nº1',
                'image' => '/images/user.png',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Jesús',
                'username' => 'jepa139',
                'email' => 'jesus@juicypc.com',
                'address' => 'Las Maldivas Nº2',
                'image' => '/images/user.png',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Alan',
                'username' => 'alma031',
                'email' => 'alan@juicypc.com',
                'address' => 'Messi Avenue Nº3',
                'image' => '/images/user.png',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Beemo',
                'username' => 'bmo',
                'email' => 'bmo@juicypc.com',
                'address' => 'Robot Street, 101',
                'image' => 'images/users/BMO.jpg',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'normal',
            ],

        ];

        User::insert($users);
    }
}
