<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Http\Request;
use App\Models\User; // User model
use Spatie\Permission\Models\Permission; // Import Permission model
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'manage']);
        // $adminRole = Role::create(['name' => 'admin']);
        // $adminRole->givePermissionTo(['manage']);
        $user = User::find(2);
        $user->assignRole('admin');
    }
}
