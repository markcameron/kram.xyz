<?php namespace App\Http\Controllers\Admin;

use App\Models\Log;
use App\Http\Requests;

use App\Http\Controllers\Admin\ResourcesController;

use Redirect;
use Variables;

use Illuminate\Http\Request;

class LogsController extends ResourcesController {

  public function __construct() {
    parent::__construct();

    $this->setModel(new Log());
    $this->setViewPath('admin.logs');
    $this->setResource('log');
    $this->setResources('logs');
  }

  /**
   * Display a listing of the given resources.
   *
   * @return Response
   */
  public function index() {
    ${$this->resources} = $this->model->orderBy('created_at', 'DESC')
      ->paginate(Variables::get('items_per_page'));

    return view($this->view_path . '.index', compact($this->resources));
  }

}
