<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 * 
 * @property int $card_id
 * @property string $card_image
 * @property string $card_image4
 * @property string $card_image5
 * @property string $card_image6
 * @property string $card_image7
 * @property string $card_image8
 * @property string $card_title
 * @property string $card_desc
 * @property Carbon $date
 *
 * @package App\Models
 */
class Card extends Model
{
	protected $table = 'cards';
	protected $primaryKey = 'card_id';
	public $timestamps = false;

	protected $casts = [
		'date' => 'datetime'
	];

	protected $fillable = [
		'card_image',
		'card_image4',
		'card_image5',
		'card_image6',
		'card_image7',
		'card_image8',
		'card_title',
		'card_desc',
		'date'
	];
}
