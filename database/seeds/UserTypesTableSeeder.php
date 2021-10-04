<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_types')->insert([
            'name' => 'owner',
        ]);
        DB::table('user_types')->insert([
            'name' => 'seller',
        ]);
        DB::table('user_types')->insert([
            'name' => 'customer',
        ]);
        DB::table('user_types')->insert([
            'name' => 'auditor',
        ]);
    }
}
