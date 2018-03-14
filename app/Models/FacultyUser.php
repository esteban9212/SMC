<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FacultyUser
 * 
 * @property float $FACULTY_ID_FACULTY
 * @property float $USER_CIP_ID_USER
 * @property float $ID_FACULTY_USER
 * 
 * @property \App\Models\Faculty $faculty
 * @property \App\Models\UserCip $user_cip
 *
 * @package App\Models
 */
class FacultyUser extends Eloquent
{
	protected $table = 'faculty_user';
	protected $primaryKey = 'ID_FACULTY_USER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FACULTY_ID_FACULTY' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'ID_FACULTY_USER' => 'float'
	];

	protected $fillable = [
		'FACULTY_ID_FACULTY',
		'USER_CIP_ID_USER'
	];

	public function faculty()
	{
		return $this->belongsTo(\App\Models\Faculty::class, 'FACULTY_ID_FACULTY');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}
}
