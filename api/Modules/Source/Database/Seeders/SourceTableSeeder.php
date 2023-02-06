<?php

namespace Modules\Source\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Source\Entities\Source;
use Illuminate\Database\Eloquent\Model;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Source::factory()->count(10)->create();
    }
}
