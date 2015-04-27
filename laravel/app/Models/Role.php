<?php namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

  public $rules = [
    'name' => 'required',
  ];

  protected $fillable = [
    'name',
    'display_name',
    'description',
  ];

}