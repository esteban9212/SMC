<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CourseProfessor
 * 
 * @property float $COURSE_ID_COURSE
 * @property float $USER_CIP_ID_USER
 * @property float $ID_COURSE_PROFESSOR
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\UserCip $user_cip
 *
 * @package App\Models
 */
class CourseProfessor extends Eloquent
{
	protected $table = 'course_professor';
	protected $primaryKey = 'ID_COURSE_PROFESSOR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'COURSE_ID_COURSE' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'ID_COURSE_PROFESSOR' => 'float'
	];

	protected $fillable = [
		'COURSE_ID_COURSE',
		'USER_CIP_ID_USER'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'COURSE_ID_COURSE');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}
}
