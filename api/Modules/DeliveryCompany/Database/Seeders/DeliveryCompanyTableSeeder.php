<?php

namespace Modules\DeliveryCompany\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\DeliveryCompany\Entities\DeliveryCompany;

class DeliveryCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        DeliveryCompany::factory()->count(10)->create();
    }
}
