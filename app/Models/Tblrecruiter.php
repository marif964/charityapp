<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblrecruiter
 * 
 * @property int $ID
 * @property string $Firstname
 * @property string $Lastname
 * @property string $Gender
 * @property string $Email
 * @property string $Password
 * @property string $status
 *
 * @package App\Models
 */
class Tblrecruiter extends Model
{
	protected $table = 'tblrecruiter';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Firstname',
		'Lastname',
		'Gender',
		'Email',
		'Password',
		'status'
	];
}
