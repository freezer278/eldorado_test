<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);

        $adminRole->syncPermissions([
            Permission::create(['name' => 'manage_songs']),
        ]);

        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
        ]);

        $adminUser->assignRole($adminRole);
    }
}
