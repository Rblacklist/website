<?php

namespace Modules\Source\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Source\Entities\TypeSource;

class TypeSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        TypeSource::factory()->count(50)->create();
    }
}
