<?php

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single text field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemText', function($name, $label, $value = NULL, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
  );

  $extras = array_merge($default_extras, $extras);

  $options = array(
    'class' => 'form-control '. $extras['class'],
  );

  if ($extras['disabled']) {
    $options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_text', compact('name', 'label', 'value', 'errors', 'help', 'options'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single text field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemPassword', function($name, $label, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
  );

  $extras = array_merge($default_extras, $extras);

  $options = array(
    'class' => 'form-control '. $extras['class'],
  );

  if ($extras['disabled']) {
    $options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_password', compact('name', 'label', 'errors', 'help', 'options'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single textarea field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemTextarea', function($name, $label, $value = NULL, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
    'rows' => '3',
  );

  $extras = array_merge($default_extras, $extras);

  $options = array(
    'class' => 'form-control '. $extras['class'],
    'rows' => $extras['rows'],
  );

  if ($extras['disabled']) {
    $options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_textarea', compact('name', 'label', 'value', 'errors', 'help', 'options'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single textarea field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemWysiwyg', function($name, $label, $value = NULL, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
    'rows' => '3',
  );

  $extras = array_merge($default_extras, $extras);

  $options = array(
    'class' => 'form-control wysiwyg'. $extras['class'],
    'rows' => $extras['rows'],
  );

  if ($extras['disabled']) {
    $options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_wysiwyg', compact('name', 'label', 'value', 'errors', 'help', 'options'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single date field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemDate', function($name, $label, $value = NULL, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
  );

  $extras = array_merge($default_extras, $extras);

  $options = array(
    'class' => 'form-control datepicker '. $extras['class'],
  );

  if ($extras['disabled']) {
    $options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_date', compact('name', 'label', 'value', 'errors', 'options', 'help'));
});

/*
 |--------------------------------------------------------------------------
 | Handles the input for a single date field
 |--------------------------------------------------------------------------
 |
 */
Form::macro('itemSelect', function($name, $label, $options, $value = NULL, $errors = NULL, $extras = array()) {
  $default_extras = array(
    'disabled' => FALSE,
    'help' => '',
    'class' => '',
  );

  $extras = array_merge($default_extras, $extras);

  $input_options = array(
    'class' => 'form-control '. $extras['class'],
  );

  if ($extras['disabled']) {
    $input_options['disabled'] = 'disabled';
  }

  $help = $extras['help'];

  return View::make('macros.item_select', compact('name', 'label', 'options', 'value', 'errors', 'help', 'input_options'));
});

/*
 |--------------------------------------------------------------------------
 | Create create button for index listings
 |--------------------------------------------------------------------------
 |
 */
Form::macro('buttonCreate', function($route, $text = NULL) {
  if (is_null($text)) {
    $text = trans('admin.buttons.create');
  }

  return View::make('macros.button_create', compact('text', 'route'));
});

/*
 |--------------------------------------------------------------------------
 | Create edit button for index listings
 |--------------------------------------------------------------------------
 |
 */
Form::macro('buttonEdit', function($route, $text = NULL) {
  if (is_null($text)) {
    $text = trans('admin.buttons.edit');
  }

  return View::make('macros.button_edit', compact('text', 'route'));
});

/*
 |--------------------------------------------------------------------------
 | Create delete  button for index listings
 |--------------------------------------------------------------------------
 |
 */
Form::macro('buttonDelete', function($route, $text = NULL) {
  if (is_null($text)) {
    $text = trans('admin.buttons.delete');
  }

  return View::make('macros.button_delete', compact('text', 'route'));
});