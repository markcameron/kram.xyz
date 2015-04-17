<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Requests;

use App\Http\Controllers\Admin\ResourcesController;

use Redirect;

use Illuminate\Http\Request;

class UsersController extends ResourcesController {

  public function __construct() {
    $this->setModel(new User());
    $this->setViewPath('admin.users');
    $this->setResource('user');
    $this->setResources('users');
  }

}
