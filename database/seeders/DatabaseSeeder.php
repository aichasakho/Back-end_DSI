<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nom' => 'ADMIN',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Sakho',
            'prenom' => 'Mouhamed',
            'email' => 'first@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123456789',
            'adresse' => 'Adresse 1',
            'tel' => '123456789',
            'registreDeCommerce' => '00002313113',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Soukouna',
            'prenom' => 'Djibril',
            'email' => 'deux@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123456709',
            'adresse' => 'Adresse 1',
            'tel' => '123456759',
            'registreDeCommerce' => '00002313113',
        ]);

        \App\Models\User::factory()->create([
            'nom' => 'Samassa',
            'prenom' => 'Boubou',
            'email' => 'trois@gmail.com',
            'password' => bcrypt('first'),
            'role' => 'proprietaire',
            'ninea' => '123453789',
            'adresse' => 'Adresse 1',
            'tel' => '123450789',
            'registreDeCommerce' => '00002313113',
        ]);



        \App\Models\User::factory(10)->create();

        $this->call([
            TypeBienSeeder::class,
            LocaliteSeeder::class,
            BienImmobilierSeeder::class,
            AppartementSeeder::class,
            AnnonceSeeder::class,
        ]);
    }
}
