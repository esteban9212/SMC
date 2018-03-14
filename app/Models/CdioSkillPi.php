<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioSkillPi
 * 
 * @property float $CDIO_SKILL_ID_CDIO_SKILL
 * @property float $PI_ID_PI
 * @property float $P_CDIO_SKILL_PI
 * 
 * @property \App\Models\CdioSkill $cdio_skill
 * @property \App\Models\PiSmc $pi_smc
 *
 * @package App\Models
 */
class CdioSkillPi extends Eloquent
{
	protected $table = 'cdio_skill_pi';
	protected $primaryKey = 'P_CDIO_SKILL_PI';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CDIO_SKILL_ID_CDIO_SKILL' => 'float',
		'PI_ID_PI' => 'float',
		'P_CDIO_SKILL_PI' => 'float'
	];

	protected $fillable = [
		'CDIO_SKILL_ID_CDIO_SKILL',
		'PI_ID_PI'
	];

	public function cdio_skill()
	{
		return $this->belongsTo(\App\Models\CdioSkill::class, 'CDIO_SKILL_ID_CDIO_SKILL');
	}

	public function pi_smc()
	{
		return $this->belongsTo(\App\Models\PiSmc::class, 'PI_ID_PI');
	}
}
