<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EvalReport
 * 
 * @property int $ID_EVAL_REPORT
 * @property int $PERIOD_ID_PERIOD
 * @property int $STATE_ID_STATE
 * @property int $USER_CIP_ID_USER
 * @property int $ID_EVAL_CYCLE
 * @property int $PERIOD
 * @property int $ASSIGNED_TO
 * @property int $STATISTIC
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'PERIOD_ID_PERIOD' => 'int',
		'STATE_ID_STATE' => 'int',
		'USER_CIP_ID_USER' => 'int',
		'ID_EVAL_CYCLE' => 'int',
		'PERIOD' => 'int',
		'ASSIGNED_TO' => 'int',
		'STATISTIC' => 'int'
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
