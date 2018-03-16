<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomeCycleA
 * 
 * @property int $MAIN_CYCLE_ID_CYCLE
 * @property int $OUTCOME_ID_ST_OUTCOME
 * @property int $ID_OUTCO_CYCLE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'MAIN_CYCLE_ID_CYCLE' => 'int',
		'OUTCOME_ID_ST_OUTCOME' => 'int'
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
