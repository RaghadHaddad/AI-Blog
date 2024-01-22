<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Authors;
use App\Models\Category;
use App\Models\contacts;
use App\Models\Resource;
use App\Models\ResourceDetail;
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
        // Authors::factory(5)->create();
// Category::factory(5)->create();
// Resource::factory(5)->create();
// ResourceDetail::factory(5)->create();
contacts::factory(3)->create();
    }
}
