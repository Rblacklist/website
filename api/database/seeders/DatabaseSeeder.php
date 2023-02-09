<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ApiKeySeeder;
use Illuminate\Support\Facades\App;
use Database\Seeders\PermissionSeeder;
use Modules\User\Database\Seeders\UserTableSeeder;
use Modules\Zone\Database\Seeders\DairaTableSeeder;
use Modules\Zone\Database\Seeders\WilayaTableSeeder;
use Modules\DeliveryCompany\Entities\DeliveryCompany;
use Modules\Source\Database\Seeders\SourceTableSeeder;
use Modules\Customer\Database\Seeders\PhoneTableSeeder;
use Modules\Product\Database\Seeders\ProductTableSeeder;
use Modules\Customer\Database\Seeders\CustomerTableSeeder;
use Modules\Order\Database\Seeders\StatusOrderTableSeeder;
use Modules\DeliveryCompany\Database\Seeders\DeliveryCompanyTableSeeder;
use Modules\Setting\Database\Seeders\ConfMailTableSeeder;
use Modules\Setting\Database\Seeders\SettingTableSeeder;

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
            $this->call([
                //
                ApiKeySeeder::class,
                RoleSeeder::class,
                PermissionSeeder::class,
                WilayaTableSeeder::class,
                DairaTableSeeder::class,
                SettingTableSeeder::class,
                ConfMailTableSeeder::class,
            ]);
        } else {
            $this->call([
                //
                ApiKeySeeder::class,
                RoleSeeder::class,
                PermissionSeeder::class,
                SettingTableSeeder::class,
                ConfMailTableSeeder::class,
                WilayaTableSeeder::class,
                DairaTableSeeder::class,
                StatusOrderTableSeeder::class,
                DeliveryCompanyTableSeeder::class,
                SourceTableSeeder::class,
                UserTableSeeder::class,
                ProductTableSeeder::class,
                CustomerTableSeeder::class,
                PhoneTableSeeder::class,
            ]);
        }
    }
}
