<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
//        \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(\App\Models\User::class)->count(1000)->create();
        \Illuminate\Database\Eloquent\Factories\Factory::factoryForModel(\App\Models\Friend::class)->count(6000)->create();
    }

}
