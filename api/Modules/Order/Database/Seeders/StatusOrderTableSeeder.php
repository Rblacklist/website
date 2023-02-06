<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\Entities\StatusOrder;

class StatusOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [];

        $data[] = [
            'name' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $data[] = [
            'name' => 'failed 01',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $data[] = [
            'name' => 'failed 02',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $data[] = [
            'name' => 'failed 03',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $data[] = [
            'name' => 'confirme',
            'created_at' => now(),
            'updated_at' => now()
        ];

        $data[] = [
            'name' => 'cancelled',
            'created_at' => now(),
            'updated_at' => now()
        ];


        StatusOrder::insert($data);
    }
}
