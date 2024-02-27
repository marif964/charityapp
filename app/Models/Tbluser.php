<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbluser
 * 
 * @property int $ID
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Gender
 * @property string $Email
 * @property string $Password
 * @property string $profession
 * @property string $cv
 * @property string $status
 *
 * @package App\Models
 */
class Tbluser extends Model
{
	protected $table = 'tbluser';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Firstname',
		'Lastname',
		'Gender',
		'Email',
		'Password',
		'profession',
		'cv',
		'status'
	];
}
