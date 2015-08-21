<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Input;
use Response;

class AjaxController extends AdminController {

  public function __construct() {
    parent::__construct();

    // Apply the ajax filter
    $this->beforeFilter('ajax-request');
  }

  public function postDropzoneUpload($model_name, $id, $type) {
    $model = '\App\Models\\' . $model_name;
    $row = $model::find($id);

    if (Input::hasFile('file')) {
      return Response::json($row->saveMedia(Input::file('file'), $type, 'gallery'));
    }
  }

  public function postDropzoneDelete($model_name, $model_id, $id) {
    $model = '\App\Models\\' . $model_name;
    $row = $model::find($model_id);

    $row->deleteMediaById($id);

    return Response::make('OK', 200);
  }

  public function postDropzoneUpdateMeta($model_name, $model_id, $id) {
    $model = '\App\Models\\' . $model_name;
    $row = $model::find($model_id);

    $options = [
      Input::get('type') => Input::get('text'),
    ];

    $row->updateMediaById(Input::get('id'), $options);

    return Response::make('OK', 200);
  }

  public function postDropzoneUpdatePositions($model_name, $model_id, $id) {
    $model = '\App\Models\\' . $model_name;
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