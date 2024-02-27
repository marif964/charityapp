<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fundraiser
 * 
 * @property int $fund_id
 * @property string $catagory
 * @property string $fund_name
 * @property string $fund_title
 * @property string $fund_image
 * @property string $fund_url
 * @property string $fund_desc
 * @property string $fund_goal
 * @property string|null $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Fundraiser extends Model
{
	protected $table = 'fundraiser';
	protected $primaryKey = 'fund_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fund_id' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'catagory',
		'fund_name',
		'fund_title',
		'fund_image',
		'fund_url',
		'fund_desc',
		'fund_goal',
		'status',
		'date'
	];
}
