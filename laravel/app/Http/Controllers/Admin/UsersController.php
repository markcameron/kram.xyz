<?php namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Requests;
use App\Libs\Admin;
use App\Libs\Helpers;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;

class UsersController extends ResourcesController {

  public function __construct() {
    parent::__construct();

    $this->setModel(new User());
    $this->setViewPath('admin.users');
    $this->setResource('user');
    $this->setResources('users');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request) {
    $this->validate($request, isset($this->model->rules_create) ? $this->model->rules_create : $this->model->rules);

    $fillable_data = array_only($request->all(), $this->model->getFillable());

    $fillable_data['password'] = bcrypt($request->password);

    App::setLocale(Helpers::getLang());

    ${$this->resource} = $this->model->create($fillable_data);

    Admin::handleFileUpload('image', ${$this->resource}, 'image');

    return back()->with('success', 'Created');
  }

  /**
   * Update a newly created resource in storage.
   *
   * @return Response
   */
  public function update($id, Request $request) {
    $this->validate($request, isset($this->model->rules_update) ? $this->model->rules_update : $this->model->rules);

    ${$this->resource} = $this->model->findOrFail($id);

    $fillable_data = array_only($request->all(), $this->model->getFillable());

    if ($request->password) {
      $fillable_data['password'] = bcrypt($request->password);
    }

    App::setLocale(Helpers::getLang());

    ${$this->resource}->update($fillable_data);

    Admin::handleFileUpload('image', ${$this->resource}, 'image');

    return Redirect::route($this->view_path . '.index')->with('success', 'yeah');
  }

}
