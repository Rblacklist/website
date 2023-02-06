<?php

namespace Modules\Store\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Store\Entities\Store;
use Illuminate\Database\Eloquent\Model;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory()->count(100)->create();
    }
}
