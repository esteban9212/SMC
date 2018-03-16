<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $ID_COURSE
 * @property string $NAME_COURSE
 * @property string $CODE
 * @property int $CREDITS
 * @property string $PROGRAM_ID_PROGRAM
 * @property int $BLOCK_COURSE_ID_BLOCK
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\BlockCourse $block_course
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

	protected $casts = [
		'CREDITS' => 'int',
		'BLOCK_COURSE_ID_BLOCK' => 'int'
	];

	protected $fillable = [
		'NAME_COURSE',
		'CODE',
		'CREDITS',
		'PROGRAM_ID_PROGRAM',
		'BLOCK_COURSE_ID_BLOCK'
	];

	public function block_course()
	{
		return $this->belongsTo(\App\Models\BlockCourse::class, 'BLOCK_COURSE_ID_BLOCK');
	}

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
