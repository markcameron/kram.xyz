<?php namespace App\Libs;

use Input;

class Admin {

  /**
   * Handles the calls to remove existing media and add new media to an object
   * using the devfactory/media package
   *
   * @param $name string
   *  The name of the input field
   *
   * @param $model object
   *  The Eloquent model object which the media will be linked
   *
   * @param $type string
   *  The name of the type for the Media Package
   *
   * @return
   */
  public static function handleFileUpload($name, $model, $type) {
    if (!Input::get('old_file_'. $name)) {
      $file = $model->getMedia($type);
      if (!$file->isEmpty()) {
        $model->deleteMedia($type);
      }
    }

    if (Input::hasFile($name)) {
      $model->saveMedia(Input::file($name), $type, 'single');
    }
  }

  /**
   * Renders a button to toggle the status field of a given model
   *
   * @param content
   * @param model_name
   * @param route
   * @param class
   *
   * @return
   */
  public static function renderStatusButton($model, $model_name, $route = 'admin.change.status', $class = 'change-status') {
    if (is_null($model->status)) {
      return 'Model has no "status" attribute';
    }

    $data = array(
      'href' => route($route, array($model_name, $model->id)),
      'class' => $class,
      'icon' => 'fa-circle-o',
      'btn_type' => 'btn-default',
    );

    if ($model->status) {
      $data['icon'] = 'fa-check';
      $data['btn_type'] = 'btn-success';
    }

    $button = view('admin.partials.status_button', $data);

    return $button;
  }

}