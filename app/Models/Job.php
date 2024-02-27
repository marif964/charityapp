<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $salary
 * @property int $recruiter
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';
	public $timestamps = false;

	protected $casts = [
		'salary' => 'int',
		'recruiter' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'salary',
		'recruiter'
	];
}
