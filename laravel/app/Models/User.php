<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Devfactory\Media\MediaTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, MediaTrait, EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

  public $rules = [
    'first_name'  => 'required',
    'last_name'  => 'required',
    'email' => 'required',
  ];

  public $rules_create = [
    'first_name'  => 'required',
    'last_name'  => 'required',
    'email' => 'required|unique:users,email',
  ];

  public $rules_update = [
    'first_name'  => 'required',
    'last_name'  => 'required',
    'email' => 'required',
  ];

  /**
	 * Returns the users full name, it simply concatenates
	 * the users first and last name.
	 *
	 * @return string
	 */
	public function getFullNameAttribute() {
		return "{$this->first_name} {$this->last_name}";
	}

}
