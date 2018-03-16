<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioSkillPi
 * 
 * @property int $CDIO_SKILL_ID_CDIO_SKILL
 * @property int $PI_ID_PI
 * @property int $P_CDIO_SKILL_PI
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'CDIO_SKILL_ID_CDIO_SKILL' => 'int',
		'PI_ID_PI' => 'int'
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
