<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CourseProfessor
 * 
 * @property int $COURSE_ID_COURSE
 * @property int $USER_CIP_ID_USER
 * @property int $ID_COURSE_PROFESSOR
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'COURSE_ID_COURSE' => 'int',
		'USER_CIP_ID_USER' => 'int'
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
