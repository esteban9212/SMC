<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Alert
 * 
 * @property int $STATE_ID_STATE
 * @property int $ID_ALERT
 * @property string $ALERT_NAME
 * @property int $ID_PLAN
 * @property \Carbon\Carbon $DATE_ALERT
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\PlanSmc $plan_smc
 *
 * @package App\Models
 */
class Alert extends Eloquent
{
	protected $table = 'alert';
	protected $primaryKey = 'ID_ALERT';

	protected $casts = [
		'STATE_ID_STATE' => 'int',
		'ID_PLAN' => 'int'
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
}
