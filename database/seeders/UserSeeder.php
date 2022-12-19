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
                'email' => 'erga916@vidalibarraquer.net',
                'address' => 'La Cañada Real Nº1',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Jesús',
                'username' => 'jepa139',
                'email' => 'jepa139@vidalibarraquer.net',
                'address' => 'Las Maldivas Nº2',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Alan',
                'username' => 'alma031',
                'email' => 'alma031@vidalibarraquer.net',
                'address' => 'Messi Avenue Nº3',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'admin',
            ],

            [
                'name' => 'Usuario Normal',
                'username' => 'NormalUser',
                'email' => 'user@gmail.com',
                'address' => 'Snowman Street',
                'password' => Hash::make('12345678'),
                'accountBalance' => '1500',
                'shippingRegion' => 'España',
                'role' => 'normal',
            ],

        ];

        User::insert($users);
    }
}
