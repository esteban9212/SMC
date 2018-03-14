<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EvalReport
 * 
 * @property float $ID_EVAL_REPORT
 * @property float $PERIOD_ID_PERIOD
 * @property float $STATE_ID_STATE
 * @property float $USER_CIP_ID_USER
 * @property int $ID_EVAL_CYCLE
 * @property float $PERIOD
 * @property float $ASSIGNED_TO
 * @property float $STATISTIC
 * 
 * @property \App\Models\UserCip $user_cip
 * @property \App\Models\EvalCycle $eval_cycle
 * @property \App\Models\StateSmc $state_smc
 * @property \App\Models\RubricFile $rubric_file
 *
 * @package App\Models
 */
class EvalReport extends Eloquent
{
	protected $table = 'eval_report';
	protected $primaryKey = 'ID_EVAL_REPORT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_EVAL_REPORT' => 'float',
		'PERIOD_ID_PERIOD' => 'float',
		'STATE_ID_STATE' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'ID_EVAL_CYCLE' => 'int',
		'PERIOD' => 'float',
		'ASSIGNED_TO' => 'float',
		'STATISTIC' => 'float'
	];

	protected $fillable = [
		'PERIOD_ID_PERIOD',
		'STATE_ID_STATE',
		'USER_CIP_ID_USER',
		'ID_EVAL_CYCLE',
		'PERIOD',
		'ASSIGNED_TO',
		'STATISTIC'
	];

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}

	public function eval_cycle()
	{
		return $this->belongsTo(\App\Models\EvalCycle::class, 'ID_EVAL_CYCLE');
	}

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}

	public function rubric_file()
	{
		return $this->belongsTo(\App\Models\RubricFile::class, 'STATISTIC');
	}
}
