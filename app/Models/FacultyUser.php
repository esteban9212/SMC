<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FacultyUser
 * 
 * @property int $FACULTY_ID_FACULTY
 * @property int $USER_CIP_ID_USER
 * @property int $ID_FACULTY_USER
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'FACULTY_ID_FACULTY' => 'int',
		'USER_CIP_ID_USER' => 'int'
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
