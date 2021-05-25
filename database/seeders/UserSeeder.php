<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'Maksim',
                'last_name' => 'Manager',
                'login' => 'manager',
                'pincode' => '123',
                'role_id' => User::MANAGER_ROLE_ID,
                'warehouse_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'first_name' => 'Maksim',
                'last_name' => 'Warehouse Manager',
                'login' => 'wmanager',
                'pincode' => '123',
                'role_id' => User::WAREHOUSE_MANAGER_ROLE_ID,
                'warehouse_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'first_name' => 'Maksim',
                'last_name' => 'Worker',
                'login' => 'worker',
                'pincode' => '123',
                'role_id' => User::WORKER_ROLE_ID,
                'warehouse_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
