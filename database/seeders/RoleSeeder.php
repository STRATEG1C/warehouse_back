<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = User::ROLE_NAMES;
        $seedData = [];

        for ($i = 0; $i < count($roleNames); $i++) {
            $seedData[] = [
                'id' => $i + 1,
                'name' => $roleNames[$i]
            ];
        }

        DB::table('roles')->insert($seedData);
    }
}
