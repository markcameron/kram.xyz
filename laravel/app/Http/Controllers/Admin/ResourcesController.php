<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Http\Controllers\Admin\AdminController;

use Redirect;
use Variables;

use Illuminate\Http\Request;

class ResourcesController extends AdminController {

  protected $model;

  protected $view_path;

  protected $resource;

  protected $resources;

  public function setModel($model) {
    $this->model = $model;
  }

  public function setViewPath($view_path) {
    $this->view_path = $view_path;
  }

  public function setResource($resource) {
    $this->resource = $resource;
  }

  public function setResources($resources) {
    $this->resources = $resources;
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

  /**
   * Display a form to create the given resource.
   *
   * @return Response
   */
  public function create() {
    return view($this->view_path . '.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request) {
    $this->validate($request, isset($this->model->rules_create) ? $this->model->rules_create : $this->model->rules);

    $fillable_data = array_only($request->all(), $this->model->getFillable());

    $this->model->create($fillable_data);

    return Redirect::route($this->view_path . '.index')->with('success', 'yeah');
  }

  /**
   * Edit the specified resource
   *
   * @return Response
   */
  public function edit($id) {
    ${$this->resource} = $this->model->findOrFail($id);

    return view($this->view_path . '.edit', compact($this->resource));
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

    ${$this->resource}->update($fillable_data);

    return Redirect::route($this->view_path . '.index')->with('success', 'yeah');
  }

  /**
   * Display the specified resource.
   *
   * @return Response
   */
  public function show($id) {
    ${$this->resource} = $this->model->findOrFail($id);

    return view($this->view_path . '.show', compact($this->resource));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id) {
    CaseModel::destroy($id);

    return Response::make('OK', 200);
  }

}
