<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * 
 * @property int $booking_id
 * @property int $user_id
 * @property string $user_email
 * @property string $car_title
 * @property string $booking_select
 * @property string $booking_date
 * @property string $booking_time
 * @property string|null $status
 *
 * @package App\Models
 */
class Booking extends Model
{
	protected $table = 'booking';
	protected $primaryKey = 'booking_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'user_email',
		'car_title',
		'booking_select',
		'booking_date',
		'booking_time',
		'status'
	];
}
