<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('name', 'admin')->first();
        $authorRoles = Roles::where('name', 'author')->first();
        $userRoles = Roles::where('name', 'user')->first();
        $admin = Admin::create([
            'admin_name' => 'AnhKleeAdmin',
            'admin_email' => 'anhtuank17pxu@gmail.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('1602')
        ]);
        $author = Admin::create([
            'admin_name' => 'AnhKleeAuthor',
            'admin_email' => 'anhtuank17pxu@gmail.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('1602')
        ]);
        $user = Admin::create([
            'admin_name' => 'AnhKleeUser',
            'admin_email' => 'anhtuank17pxu@gmail.com',
            'admin_phone' => '0123456789',
            'admin_password' => md5('1602')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
