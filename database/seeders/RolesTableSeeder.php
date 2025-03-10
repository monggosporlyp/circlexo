<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'guard_name' => 'web',
                'name' => 'admin',
                'created_at' => '2017-11-21 16:23:22',
                'updated_at' => '2017-11-21 16:23:22',
            ),
            1 =>
            array (
                'id' => 2,
                'guard_name' => 'web',
                'name' => 'registered',
                'created_at' => '2017-11-21 16:23:22',
                'updated_at' => '2017-11-21 16:23:22',
            ),
            2 =>
            array (
                'id' => 3,
                'guard_name' => 'web',
                'name' => 'basic',
                'created_at' => '2017-11-21 16:23:22',
                'updated_at' => '2017-11-21 16:23:22',
            ),
            3 =>
            array (
                'id' => 4,
                'guard_name' => 'web',
                'name' => 'premium',
                'created_at' => '2018-07-03 05:03:21',
                'updated_at' => '2018-07-03 17:28:44',
            ),
            4 =>
            array (
                'id' => 5,
                'guard_name' => 'web',
                'name' => 'pro',
                'created_at' => '2018-07-03 16:27:16',
                'updated_at' => '2018-07-03 17:28:38',
            )
        ));


    }
}
