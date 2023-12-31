<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','user'];

        foreach ($roles as $value) {
            Role::firstOrCreate(
                ['name' => $value],
                ['name' => $value]
            );
        }
    }
}
