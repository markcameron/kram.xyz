<?php

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single file upload
 |--------------------------------------------------------------------------
 |
 */
Form::macro('singleUpload', function($name, $label, $model, $type) {
  $file = NULL;
  $model_name = '';

  if (!is_null($model)) {
    $file = $model->getMedia($type)->first();
    $model_name = class_basename($model);
  }

  return View::make('macros.single_upload', compact('name', 'label', 'file', 'model', 'model_name', 'type'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a multiple file upload
 |--------------------------------------------------------------------------
 |
 */
Form::macro('multiUpload', function($model, $type) {
  $files = $model->getMedia($type);
  $model_name = class_basename($model);

  return View::make('macros.multi_upload', compact('files', 'model', 'model_name', 'type'));
});