<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permission1 = Permission::create(['name' => 'view dashboard']);
        $permission2 = Permission::create(['name' => 'manage users']);
        $permission3 = Permission::create(['name' => 'create posts']);

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($permission1, $permission2, $permission3);
        $userRole->givePermissionTo($permission1);

        // You can assign roles to existing users here, if needed
       $user = User::find(1);
        $user->assignRole('admin');
    }
}
