<?php namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Http\Requests;

use App\Http\Controllers\Admin\ResourcesController;

use Redirect;

use Illuminate\Http\Request;

class PagesController extends ResourcesController {

  public function __construct() {
    parent::__construct();

    $this->setModel(new Page());
    $this->setViewPath('admin.pages');
    $this->setResource('page');
    $this->setResources('pages');
  }

}
