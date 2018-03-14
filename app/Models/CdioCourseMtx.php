<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioCourseMtx
 * 
 * @property float $ID_COURSE
 * @property float $ID_CDIO_LVL
 * @property string $VERSION
 * @property float $ID_MTX_COURSE_CDIO_LVL
 * @property string $ID_PROGRAM
 * @property float $ID_CDIO_SKILL
 * 
 * @property \App\Models\CdioLvl $cdio_lvl
 * @property \App\Models\CdioSkill $cdio_skill
 * @property \App\Models\Course $course
 * @property \App\Models\ProgramSmc $program_smc
 *
 * @package App\Models
 */
class CdioCourseMtx extends Eloquent
{
	protected $table = 'cdio_course_mtx';
	protected $primaryKey = 'ID_MTX_COURSE_CDIO_LVL';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_COURSE' => 'float',
		'ID_CDIO_LVL' => 'float',
		'ID_MTX_COURSE_CDIO_LVL' => 'float',
		'ID_CDIO_SKILL' => 'float'
	];

	protected $fillable = [
		'ID_COURSE',
		'ID_CDIO_LVL',
		'VERSION',
		'ID_PROGRAM',
		'ID_CDIO_SKILL'
	];

	public function cdio_lvl()
	{
		return $this->belongsTo(\App\Models\CdioLvl::class, 'ID_CDIO_LVL');
	}

	public function cdio_skill()
	{
		return $this->belongsTo(\App\Models\CdioSkill::class, 'ID_CDIO_SKILL');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'ID_COURSE');
	}

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'ID_PROGRAM');
	}
}
