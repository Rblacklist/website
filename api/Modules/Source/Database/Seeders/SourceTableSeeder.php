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

        Source::create(
            [
                'name' => 'Woocommerce',
                'base_url' => "https://youcan.shop",
                'avatar' => 'https://expediten.se/wp-content/uploads/2021/10/woocommerce-utvecklare.png',
                'data' => [
                    'type' => 'woocommerce',
                    'key' => '7087FHDFDE7RE8R70HFHLDJFE7R',
                    'secret' => '7087FHDFDHJFHDE8R70HFHLDJFE7R',
                ],
                'status' => 1
            ]
        );

        Source::create(
            [
                'name' => 'YouCan',
                'base_url' => "https://youcan.shop",
                'avatar' => "https://youcan.shop/images/brand_images/Logo-YouCan-4.png",
                'data' => [
                    'type' => 'you_can',
                    'key' => '7087FHDFDE7RE8R70HFHLDJFE7R',
                    'secret' => '7087FHDFDE7RE8R70HFHLDJFE7R',
                ],
                'status' => 1
            ]
        );
    }
}
