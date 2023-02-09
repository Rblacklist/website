<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        $superAdmin = User::create([
            'firstname' => 'Test',
            'lastname' => 'Test',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
            'code' => '+213',
            'phone' => '6640000000',
            'avatar' => 'https://avatars.dicebear.com/v2/male/3397358c1ca2bbec334d847e4414376a.svg',
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super-admin');

        if (App::environment() !== 'production') {
            User::factory()->count(10)->create();
        }
    }
}
