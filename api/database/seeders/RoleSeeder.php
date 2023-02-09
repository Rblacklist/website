<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];

        $data[] = [
            'name' => 'super-admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'manager',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'member',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Role::insert($data);
    }
}
