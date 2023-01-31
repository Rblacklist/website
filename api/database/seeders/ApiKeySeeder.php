<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('api_keys')->insert([
            'name' => 'fontend',
            'key' => '8Dwg95XEf6grLhvKJOV0LxrPffbOXBZjtazs9pV1IX6PcL6jZA2fhyCZh1IuTzDq',
            'active' => 1
        ]);
    }
}
