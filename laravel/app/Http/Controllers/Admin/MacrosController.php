<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;

use Input;
use Response;

class MacrosController extends AdminController {

  protected $model;

  public function __construct() {
    parent::__construct();

    $this->model = 'App\Models\\';

    // Apply the ajax filter
    $this->beforeFilter('ajax-request');
  }

  public function postDropzoneUpload($model, $id, $type) {
    $model = $this->model . $model;
    $row = $model::find($id);

    if (Input::hasFile('file')) {
      return Response::json($row->saveMedia(Input::file('file'), $type, 'gallery'));
    }
  }

  public function postDropzoneDelete($model, $model_id, $id) {
    $model = $this->model . $model;
    $row = $model::find($model_id);

    $row->deleteMediaById($id);

    return Response::make('OK', 200);
  }

  public function postDropzoneUpdateMeta($model, $model_id, $id) {
    $model = $this->model . $model;
    $row = $model::find($model_id);

    $options = [
      Input::get('type') => Input::get('text'),
    ];

    $row->updateMediaById(Input::get('id'), $options);

    return Response::make('OK', 200);
  }

  public function postDropzoneUpdatePositions($model, $model_id, $id) {
    $model = $this->model . $model;
    $row = $model::find($model_id);

    $data = Input::all();

    foreach ($data['media_id'] as $weight => $media_id) {
      $options = [
        'weight' => $weight,
      ];

      $row->updateMediaById($media_id, $options);
    }

    return Response::make('OK', 200);
  }

}