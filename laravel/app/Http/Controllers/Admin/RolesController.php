<?php namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Requests;

use App\Http\Controllers\Admin\ResourcesController;

use Redirect;

use Illuminate\Http\Request;

class RolesController extends ResourcesController {

  public function __construct() {
    $this->setModel(new Role());
    $this->setViewPath('admin.roles');
    $this->setResource('role');
    $this->setResources('roles');
  }

}
