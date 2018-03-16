<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioSkill
 * 
 * @property int $ID_CDIO_SKILL
 * @property string $DESCRIPTION
 * @property int $CDIO_ID_CDIO
 * @property int $CDIO_SKILL_ID_CDIO_SKILL
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Cdio $cdio
 * @property \App\Models\CdioSkill $cdio_skill
 * @property \Illuminate\Database\Eloquent\Collection $cdio_course_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $cdio_outcome_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $cdio_skills
 * @property \Illuminate\Database\Eloquent\Collection $cdio_skill_pis
 *
 * @package App\Models
 */
class CdioSkill extends Eloquent
{
	protected $table = 'cdio_skill';
	protected $primaryKey = 'ID_CDIO_SKILL';

	protected $casts = [
		'CDIO_ID_CDIO' => 'int',
		'CDIO_SKILL_ID_CDIO_SKILL' => 'int'
	];

	protected $fillable = [
		'DESCRIPTION',
		'CDIO_ID_CDIO',
		'CDIO_SKILL_ID_CDIO_SKILL'
	];

	public function cdio()
	{
		return $this->belongsTo(\App\Models\Cdio::class, 'CDIO_ID_CDIO');
	}

	public function cdio_skill()
	{
		return $this->belongsTo(\App\Models\CdioSkill::class, 'CDIO_SKILL_ID_CDIO_SKILL');
	}

	public function cdio_course_mtxes()
	{
		return $this->hasMany(\App\Models\CdioCourseMtx::class, 'ID_CDIO_SKILL');
	}

	public function cdio_outcome_mtxes()
	{
		return $this->hasMany(\App\Models\CdioOutcomeMtx::class, 'ID_CDIO_SKILL');
	}

	public function cdio_skills()
	{
		return $this->hasMany(\App\Models\CdioSkill::class, 'CDIO_SKILL_ID_CDIO_SKILL');
	}

	public function cdio_skill_pis()
	{
		return $this->hasMany(\App\Models\CdioSkillPi::class, 'CDIO_SKILL_ID_CDIO_SKILL');
	}
}
