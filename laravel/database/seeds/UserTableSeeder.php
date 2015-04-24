<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder {

  public function run() {
    if (User::count()) {
      return;
    }

    $role_admin = new Role();
    $role_admin->name         = 'admin';
    $role_admin->display_name = 'Admin';
    $role_admin->description  = 'Site Administrator';
    $role_admin->save();

    $role_admin = new Role();
    $role_admin->name         = 'user';
    $role_admin->display_name = 'User';
    $role_admin->description  = 'User with access to logged in areas of the site, but not the admin';
    $role_admin->save();

    $user = User::create(
      [
        'first_name' => 'Admin',
        'last_name' => 'Account',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin'),
      ]
    );

    $user->attachRole($role_admin);
  }
}
