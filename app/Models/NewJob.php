<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewJob
 * 
 * @property int $user_id
 * @property int $recuter_id
 * @property int $job_id
 *
 * @package App\Models
 */
class NewJob extends Model
{
	protected $table = 'new_job';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'recuter_id' => 'int',
		'job_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'recuter_id',
		'job_id'
	];
}
