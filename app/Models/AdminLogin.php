<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminLogin
 * 
 * @property int $admin_id
 * @property string $admin_email
 * @property string $admin_password
 * @property Carbon $date
 *
 * @package App\Models
 */
class AdminLogin extends Model
{
	protected $table = 'admin_login';
	protected $primaryKey = 'admin_id';
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime'
	];

	protected $hidden = [
		'admin_password'
	];

	protected $fillable = [
		'admin_email',
		'admin_password',
		'date'
	];
}
