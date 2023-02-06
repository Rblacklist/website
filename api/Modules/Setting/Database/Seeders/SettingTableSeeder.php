<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Setting; 

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'key' => 'title',
            'value' => 'Rblacklist',
        ];

        $data[] = [
            'key' => 'site_name',
            'value' => 'Rblacklist',
        ];

        $data[] = [
            'key' => 'currency',
            'value' => 'Da',
        ];


        $data[] = [
            'key' => 'country',
            'value' => 'Algérie',
        ];

        $data[] = [
            'key' => 'phone',
            'value' => '+213066000000',
        ];

        $data[] = [
            'key' => 'email',
            'value' => 'rblacklist@rblacklist.com',
        ];

        $data[] = [
            'key' => 'address',
            'value' => 'Rblacklist Address, 123',
        ];

        $data[] = [
            'key' => 'time_zone',
            'value' => 'Africa/Algiers',
        ];


        $data[] = [
            'key' => 'logo',
            'value' => 'logo-short.png',
        ];

        $data[] = [
            'key' => 'favicon',
            'value' => 'favicon.ico'
        ];

        // -------------------------------
        Setting::insert($data);
    }
}
