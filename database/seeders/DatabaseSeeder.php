<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123')
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);


        $managePermission = Permission::create(['name' => 'manage-admins']);

        $createAdminPermission = Permission::create(['name' => 'create-admin']);
        $editAdminPermission = Permission::create(['name' => 'edit-admin']);
        $viewAdminPermission = Permission::create(['name' => 'view-admin']);
        $deleteAdminPermission = Permission::create(['name' => 'delete-admin']);
        $listAdminPermission = Permission::create(['name' => 'list-admin']);


        $managePermission->givePermissionTo($createAdminPermission);
        $managePermission->givePermissionTo($editAdminPermission);
        $managePermission->givePermissionTo($viewAdminPermission);
        $managePermission->givePermissionTo($deleteAdminPermission);
        $managePermission->givePermissionTo($listAdminPermission);

        $user->givePermissionTo($managePermission);
    }
}
