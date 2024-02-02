<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Permission::create(['name' => 'gerar-relatorio']);
        Permission::create(['name' => 'arranchar-all']);
        Permission::create(['name' => 'arranchar-self']);

        $adminRole = Role::create(['name' => 'admin']);
        $furrielRole = Role::create(['name' => 'furriel']);
        $userRole = Role::create(['name' => 'usuario']);

        $adminRole->givePermissionTo([
            'gerar-relatorio',
            'arranchar-all',
            'arranchar-self',
        ]);

        $furrielRole->givePermissionTo([
            'arranchar-all',
            'arranchar-self',
        ]);
        $userRole->givePermissionTo([
            'arranchar-self',
        ]);

    }
}
