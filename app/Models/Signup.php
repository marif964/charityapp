<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Signup
 * 
 * @property int $user_id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string $password
 * @property string $verifiacation_code
 * @property int|null $is_verified
 * @property Carbon $date
 *
 * @package App\Models
 */
class Signup extends Model
{
	protected $table = 'signup';
	protected $primaryKey = 'user_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'is_verified' => 'int',
		'date' => 'datetime'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'fname',
		'lname',
		'email',
		'password',
		'verifiacation_code',
		'is_verified',
		'date'
	];
}
