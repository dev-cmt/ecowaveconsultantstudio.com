<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // 1️⃣ Define Modules
        $modules = [
            'blogs',
            'categories',
            'services',
            'projects',
            'features',
            'testimonials',
            'achievements',
            'teams',
            'clients',
            'missions',
            'contact',
            'settings',
        ];

        // 2️⃣ Create CRUD Permissions
        $permissions = [];
        foreach ($modules as $module) {
            $permissions[] = "create {$module}";
            $permissions[] = "edit {$module}";
            $permissions[] = "view {$module}";
            $permissions[] = "delete {$module}";
        }

        // Create permissions in DB
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 3️⃣ Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        // 4️⃣ Assign Permissions
        $adminRole->syncPermissions($permissions); // Admin: all
        $editorRole->syncPermissions(
            array_filter($permissions, fn($p) =>
                str_starts_with($p, 'view') ||
                str_starts_with($p, 'create blogs') ||
                str_starts_with($p, 'edit blogs')
            )
        );

        // 5️⃣ Create Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole($adminRole);

        $editor = User::firstOrCreate(
            ['email' => 'editor@gmail.com'],
            [
                'name' => 'Editor User',
                'password' => Hash::make('editor123'),
            ]
        );
        $editor->assignRole($editorRole);
    }
}
