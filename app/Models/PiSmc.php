<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PiSmc
 * 
 * @property float $ID_PI
 * @property string $CODE
 * @property string $DESCRIPTION
 * @property float $PLAN_ID_PLAN
 * 
 * @property \App\Models\PlanSmc $plan_smc
 * @property \Illuminate\Database\Eloquent\Collection $as_srcs
 * @property \Illuminate\Database\Eloquent\Collection $cdio_skill_pis
 *
 * @package App\Models
 */
class PiSmc extends Eloquent
{
	protected $table = 'pi_smc';
	protected $primaryKey = 'ID_PI';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PI' => 'float',
		'PLAN_ID_PLAN' => 'float'
	];

	protected $fillable = [
		'CODE',
		'DESCRIPTION',
		'PLAN_ID_PLAN'
	];

	public function plan_smc()
	{
		return $this->belongsTo(\App\Models\PlanSmc::class, 'PLAN_ID_PLAN');
	}

	public function as_srcs()
	{
		return $this->hasMany(\App\Models\AsSrc::class, 'PI_ID_PI');
	}

	public function cdio_skill_pis()
	{
		return $this->hasMany(\App\Models\CdioSkillPi::class, 'PI_ID_PI');
	}
}
