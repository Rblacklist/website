<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\ConfMail;
use Illuminate\Database\Eloquent\Model;

class ConfMailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ConfMail::truncate();
        $data = [
            'mailer' => 'smtp',
            'host' => 'smtp.gmail.com',
            'port' => '465',
            'username' => '',
            'password' => '',
            'encryption' => 'tls',
            'from_address' => '',
            'is_selected' => 1,
        ];

        ConfMail::create($data);
    }
}
