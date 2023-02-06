<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ApiKeySeeder;
use Illuminate\Support\Facades\App;
use Modules\User\Database\Seeders\UserTableSeeder;
use Modules\Store\Database\Seeders\StoreTableSeeder;
use Modules\Source\Database\Seeders\SourceTableSeeder;
use Modules\Customer\Database\Seeders\PhoneTableSeeder;
use Modules\Product\Database\Seeders\ProductTableSeeder;
use Modules\Customer\Database\Seeders\CustomerTableSeeder;
use Modules\DeliveryCompany\Database\Seeders\DeliveryCompanyTableSeeder;
use Modules\DeliveryCompany\Entities\DeliveryCompany;
use Modules\Order\Database\Seeders\StatusOrderTableSeeder;
use Modules\Source\Database\Seeders\TypeSourceTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApiKeySeeder::class);

        if (App::environment() === 'production') {
        } else {
            $this->call([


                ApiKeySeeder::class,
                StoreTableSeeder::class,
                StatusOrderTableSeeder::class,
                DeliveryCompanyTableSeeder::class,
                TypeSourceTableSeeder::class,
                SourceTableSeeder::class,
                RoleSeeder::class,
                UserTableSeeder::class,
                ProductTableSeeder::class,
                CustomerTableSeeder::class,
                PhoneTableSeeder::class,

            ]);
        }
    }
}
