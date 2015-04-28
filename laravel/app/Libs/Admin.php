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

}