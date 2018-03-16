<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProgramSmc
 * 
 * @property string $ID_PROGRAM
 * @property string $NAME_PROGRAM
 * @property int $FACULTY_ID_FACULTY
 * @property int $USER_CIP_ID_USER
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Faculty $faculty
 * @property \App\Models\UserCip $user_cip
 * @property \Illuminate\Database\Eloquent\Collection $block_courses
 * @property \Illuminate\Database\Eloquent\Collection $cdio_course_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $cdio_outcome_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \Illuminate\Database\Eloquent\Collection $main_cycles
 * @property \Illuminate\Database\Eloquent\Collection $outcomes
 * @property \Illuminate\Database\Eloquent\Collection $peos
 *
 * @package App\Models
 */
class ProgramSmc extends Eloquent
{
	protected $table = 'program_smc';
	protected $primaryKey = 'ID_PROGRAM';
	public $incrementing = false;

	protected $casts = [
		'FACULTY_ID_FACULTY' => 'int',
		'USER_CIP_ID_USER' => 'int'
	];

	protected $fillable = [
		'NAME_PROGRAM',
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

	public function block_courses()
	{
		return $this->hasMany(\App\Models\BlockCourse::class, 'PROGRAM_ID_PROGRAM');
	}

	public function cdio_course_mtxes()
	{
		return $this->hasMany(\App\Models\CdioCourseMtx::class, 'ID_PROGRAM');
	}

	public function cdio_outcome_mtxes()
	{
		return $this->hasMany(\App\Models\CdioOutcomeMtx::class, 'PROGRAM');
	}

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class, 'PROGRAM_ID_PROGRAM');
	}

	public function main_cycles()
	{
		return $this->hasMany(\App\Models\MainCycle::class, 'PROGRAM_ID_PROGRAM');
	}

	public function outcomes()
	{
		return $this->hasMany(\App\Models\Outcome::class, 'PROGRAM_ID_PROGRAM');
	}

	public function peos()
	{
		return $this->hasMany(\App\Models\Peo::class, 'PROGRAM_ID_PROGRAM');
	}
}
