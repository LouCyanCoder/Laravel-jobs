<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Listing::factory(8)->create();

        Listing::create([
            'title' => 'Laravel senior developer',
            'tags' => 'laravel, senior, javascript',
            'company' => 'Wedevs corp',
            'location' => 'Prague, CZE',
            'email' => 'email@email.com',
            'website' => 'https://www.wedevs.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate reprehenderit maxime molestiae debitis a nisi saepe nemo molestias incidunt magni, voluptatum sunt. Vitae, quam nihil aliquam quidem quaerat corporis magni?'
        ]);

        Listing::create([
            'title' => 'Laravel junior developer',
            'tags' => 'laravel, junior, javascript',
            'company' => 'Wedevs corp',
            'location' => 'Prague, CZE',
            'email' => 'email@email.com',
            'website' => 'https://www.wedevs.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate reprehenderit maxime molestiae debitis a nisi saepe nemo molestias incidunt magni, voluptatum sunt. Vitae, quam nihil aliquam quidem quaerat corporis magni?'
        ]);
    }
}
