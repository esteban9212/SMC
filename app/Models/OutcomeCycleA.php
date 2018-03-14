<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomeCycleA
 * 
 * @property float $MAIN_CYCLE_ID_CYCLE
 * @property float $OUTCOME_ID_ST_OUTCOME
 * @property float $ID_OUTCO_CYCLE
 * 
 * @property \App\Models\MainCycle $main_cycle
 * @property \App\Models\Outcome $outcome
 * @property \Illuminate\Database\Eloquent\Collection $plan_smcs
 *
 * @package App\Models
 */
class OutcomeCycleA extends Eloquent
{
	protected $primaryKey = 'ID_OUTCO_CYCLE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'MAIN_CYCLE_ID_CYCLE' => 'float',
		'OUTCOME_ID_ST_OUTCOME' => 'float',
		'ID_OUTCO_CYCLE' => 'float'
	];

	protected $fillable = [
		'MAIN_CYCLE_ID_CYCLE',
		'OUTCOME_ID_ST_OUTCOME'
	];

	public function main_cycle()
	{
		return $this->belongsTo(\App\Models\MainCycle::class, 'MAIN_CYCLE_ID_CYCLE');
	}

	public function outcome()
	{
		return $this->belongsTo(\App\Models\Outcome::class, 'OUTCOME_ID_ST_OUTCOME');
	}

	public function plan_smcs()
	{
		return $this->hasMany(\App\Models\PlanSmc::class, 'ID_OUTCOME_CYCLE_AS');
	}
}
