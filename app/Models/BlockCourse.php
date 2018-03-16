<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlockCourse
 * 
 * @property string $NAME
 * @property int $ID_BLOCK
 * @property string $PROGRAM_ID_PROGRAM
 * @property int $USER_CIP_ID_USER
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\ProgramSmc $program_smc
 * @property \App\Models\UserCip $user_cip
 * @property \Illuminate\Database\Eloquent\Collection $courses
 *
 * @package App\Models
 */
class BlockCourse extends Eloquent
{
	protected $table = 'block_course';
	protected $primaryKey = 'ID_BLOCK';

	protected $casts = [
		'USER_CIP_ID_USER' => 'int'
	];

	protected $fillable = [
		'NAME',
		'PROGRAM_ID_PROGRAM',
		'USER_CIP_ID_USER'
	];

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM_ID_PROGRAM');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class, 'BLOCK_COURSE_ID_BLOCK');
	}
}
