<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property float $ID_COURSE
 * @property string $NAME_COURSE
 * @property string $CODE
 * @property float $CREDITS
 * @property string $PROGRAM_ID_PROGRAM
 * 
 * @property \App\Models\ProgramSmc $program_smc
 * @property \Illuminate\Database\Eloquent\Collection $as_srcs
 * @property \Illuminate\Database\Eloquent\Collection $cdio_course_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $course_professors
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	protected $table = 'course';
	protected $primaryKey = 'ID_COURSE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_COURSE' => 'float',
		'CREDITS' => 'float'
	];

	protected $fillable = [
		'NAME_COURSE',
		'CODE',
		'CREDITS',
		'PROGRAM_ID_PROGRAM'
	];

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM_ID_PROGRAM');
	}

	public function as_srcs()
	{
		return $this->hasMany(\App\Models\AsSrc::class, 'COURSE_ID_COURSE');
	}

	public function cdio_course_mtxes()
	{
		return $this->hasMany(\App\Models\CdioCourseMtx::class, 'ID_COURSE');
	}

	public function course_professors()
	{
		return $this->hasMany(\App\Models\CourseProfessor::class, 'COURSE_ID_COURSE');
	}
}
