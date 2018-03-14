<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PlanSmc
 * 
 * @property float $ID_PLAN
 * @property \Carbon\Carbon $CREATION_DATE
 * @property float $USER_CIP_ID_USER
 * @property \Carbon\Carbon $EVALUATION_DATE
 * @property string $EVALUATION_FREQUENCY
 * @property float $PERIOD_ID_PERIOD
 * @property float $STATE_ID_STATE
 * @property float $ID_OUTCOME_CYCLE_AS
 * @property float $ID_RUBRIC_FILE
 * 
 * @property \App\Models\OutcomeCycleA $outcome_cycle_a
 * @property \App\Models\RubricFile $rubric_file
 * @property \App\Models\StateSmc $state_smc
 * @property \App\Models\UserCip $user_cip
 * @property \Illuminate\Database\Eloquent\Collection $alerts
 * @property \Illuminate\Database\Eloquent\Collection $compl_srcs
 * @property \Illuminate\Database\Eloquent\Collection $eval_cycles
 * @property \Illuminate\Database\Eloquent\Collection $pi_smcs
 *
 * @package App\Models
 */
class PlanSmc extends Eloquent
{
	protected $table = 'plan_smc';
	protected $primaryKey = 'ID_PLAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PLAN' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'PERIOD_ID_PERIOD' => 'float',
		'STATE_ID_STATE' => 'float',
		'ID_OUTCOME_CYCLE_AS' => 'float',
		'ID_RUBRIC_FILE' => 'float'
	];

	protected $dates = [
		'CREATION_DATE',
		'EVALUATION_DATE'
	];

	protected $fillable = [
		'CREATION_DATE',
		'USER_CIP_ID_USER',
		'EVALUATION_DATE',
		'EVALUATION_FREQUENCY',
		'PERIOD_ID_PERIOD',
		'STATE_ID_STATE',
		'ID_OUTCOME_CYCLE_AS',
		'ID_RUBRIC_FILE'
	];

	public function outcome_cycle_a()
	{
		return $this->belongsTo(\App\Models\OutcomeCycleA::class, 'ID_OUTCOME_CYCLE_AS');
	}

	public function rubric_file()
	{
		return $this->belongsTo(\App\Models\RubricFile::class, 'ID_RUBRIC_FILE');
	}

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}

	public function alerts()
	{
		return $this->hasMany(\App\Models\Alert::class, 'ID_PLAN');
	}

	public function compl_srcs()
	{
		return $this->hasMany(\App\Models\ComplSrc::class, 'PLAN_ID_PLAN');
	}

	public function eval_cycles()
	{
		return $this->hasMany(\App\Models\EvalCycle::class, 'PLAN_ID_PLAN');
	}

	public function pi_smcs()
	{
		return $this->hasMany(\App\Models\PiSmc::class, 'PLAN_ID_PLAN');
	}
}
