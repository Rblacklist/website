<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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

        //----------------------------------------------------------------
        //----------------------------U S E R--------------------------
        //----------------------------------------------------------------
        $data[] = [
            'name' => 'user-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'user-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'user-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'user-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'user-update',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'user-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------


        //----------------------------------------------------------------
        //--------------D E L I V E R Y   C O M P A N T-----------
        //----------------------------------------------------------------

        $data[] = [
            'name' => 'delivery-company-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];


        $data[] = [
            'name' => 'delivery-company-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'delivery-company-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'delivery-company-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'delivery-company-update',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'delivery-company-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------

        //----------------------------------------------------------------
        //------------------- P R O D U C T ------------------------------
        //----------------------------------------------------------------

        $data[] = [
            'name' => 'product-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'product-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'product-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'product-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'product-update',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'product-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------


        //----------------------------------------------------------------
        //------------------ S O U R C E ----------------------------
        //----------------------------------------------------------------

        $data[] = [
            'name' => 'source-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];


        $data[] = [
            'name' => 'source-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'source-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'source-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'source-update',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'source-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------


        //----------------------------------------------------------------
        //---------------------- Z O N E ---------------------------------
        //----------------------------------------------------------------
        $data[] = [
            'name' => 'zone-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'zone-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'zone-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'zone-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];


        $data[] = [
            'name' => 'zone-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------



        //----------------------------------------------------------------
        //------------------------O R D E R------------------------------
        //----------------------------------------------------------------

        $data[] = [
            'name' => 'order-all',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'order-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'order-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'order-create',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'order-update',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'order-delete',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------


        //----------------------------------------------------------------
        //------------- S T A T I S T I C S----------------------------
        //----------------------------------------------------------------

        $data[] = [
            'name' => 'statistics-view',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $data[] = [
            'name' => 'statistics-show',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        //----------------------------------------------------------------
        //----------------------------------------------------------------
        //----------------------------------------------------------------



        Permission::insert($data);
    }
}
