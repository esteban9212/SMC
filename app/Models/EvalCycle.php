<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EvalCycle
 * 
 * @property int $MAIN_CYCLE_ID_CYCLE
 * @property int $PLAN_ID_PLAN
 * @property int $ID_EVAL_CYCLE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\MainCycle $main_cycle
 * @property \App\Models\PlanSmc $plan_smc
 * @property \Illuminate\Database\Eloquent\Collection $eval_reports
 *
 * @package App\Models
 */
class EvalCycle extends Eloquent
{
	protected $table = 'eval_cycle';
	protected $primaryKey = 'ID_EVAL_CYCLE';

	protected $casts = [
		'MAIN_CYCLE_ID_CYCLE' => 'int',
		'PLAN_ID_PLAN' => 'int'
	];

	protected $fillable = [
		'MAIN_CYCLE_ID_CYCLE',
		'PLAN_ID_PLAN'
	];

	public function main_cycle()
	{
		return $this->belongsTo(\App\Models\MainCycle::class, 'MAIN_CYCLE_ID_CYCLE');
	}

	public function plan_smc()
	{
		return $this->belongsTo(\App\Models\PlanSmc::class, 'PLAN_ID_PLAN');
	}

	public function eval_reports()
	{
		return $this->hasMany(\App\Models\EvalReport::class, 'ID_EVAL_CYCLE');
	}
}
