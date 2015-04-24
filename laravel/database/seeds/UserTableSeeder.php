<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder {

  public function run() {
    if (User::count()) {
      return;
    }


    $user = User::create(
      [
        'first_name' => 'Admin',
        'last_name' => 'Account',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin'),
      ]
    );

  }
}
