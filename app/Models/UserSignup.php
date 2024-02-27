<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserSignup
 * 
 * @property int $user_id
 * @property string $user_fname
 * @property string $user_lname
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_password
 * @property int|null $status
 * @property int|null $role_as
 * @property Carbon $date
 *
 * @package App\Models
 */
class UserSignup extends Model
{
	protected $table = 'user_signup';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'role_as' => 'int',
		'date' => 'datetime'
	];

	protected $hidden = [
		'user_password'
	];

	protected $fillable = [
		'user_fname',
		'user_lname',
		'user_email',
		'user_phone',
		'user_password',
		'status',
		'role_as',
		'date'
	];
}

