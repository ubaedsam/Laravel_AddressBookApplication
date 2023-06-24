<?php

namespace Database\Seeders;

use App\Models\Contacts;
use App\Models\Groups;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Menambah data group sebanyak 7 data
        // Groups::factory(7)->create();

        // Menambah data contact sebanyak 30 data
        Contacts::factory(30)->create();
    }
}
