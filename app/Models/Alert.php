<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Alert
 * 
 * @property float $STATE_ID_STATE
 * @property float $ID_ALERT
 * @property string $ALERT_NAME
 * @property float $ID_PLAN
 * @property \Carbon\Carbon $DATE_ALERT
 * 
 * @property \App\Models\PlanSmc $plan_smc
 * @property \App\Models\StateSmc $state_smc
 *
 * @package App\Models
 */
class Alert extends Eloquent
{
	protected $table = 'alert';
	protected $primaryKey = 'ID_ALERT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'STATE_ID_STATE' => 'float',
		'ID_ALERT' => 'float',
		'ID_PLAN' => 'float'
	];

	protected $dates = [
		'DATE_ALERT'
	];

	protected $fillable = [
		'STATE_ID_STATE',
		'ALERT_NAME',
		'ID_PLAN',
		'DATE_ALERT'
	];

	public function plan_smc()
	{
		return $this->belongsTo(\App\Models\PlanSmc::class, 'ID_PLAN');
	}

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}
}
