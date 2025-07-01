<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin_role = new Role();
        $super_admin_role->name = 'Super Admin';
        $super_admin_role->can_delete = false;
        $super_admin_role->save();

        $admin_role = new Role();
        $admin_role->name = 'مدیریت';
        $admin_role->can_delete = false;
        $admin_role->save();

        $author_role = new Role();
        $author_role->name = 'نویسنده';
        $author_role->can_delete = false;
        $author_role->save();

        $user = new User();
        $user->first_name = 'admin';
        $user->last_name = 'admin';
        $user->cellphone = '09184346148';
        $user->email = 'superadmin@example.com';
        $user->is_admin = true;
        $user->password = Hash::make('123456789');
        $user->save();
        $user->assignRole($super_admin_role);
    }
}
