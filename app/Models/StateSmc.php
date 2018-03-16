<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StateSmc
 * 
 * @property int $ID_STATE
 * @property string $STATE_NAME
 * @property int $STATE_TYPE_ID_STATE_TYPE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\StateType $state_type
 * @property \Illuminate\Database\Eloquent\Collection $eval_reports
 * @property \Illuminate\Database\Eloquent\Collection $outcomes
 * @property \Illuminate\Database\Eloquent\Collection $plan_smcs
 * @property \Illuminate\Database\Eloquent\Collection $role_cips
 * @property \Illuminate\Database\Eloquent\Collection $user_cips
 *
 * @package App\Models
 */
class StateSmc extends Eloquent
{
	protected $table = 'state_smc';
	protected $primaryKey = 'ID_STATE';

	protected $casts = [
		'STATE_TYPE_ID_STATE_TYPE' => 'int'
	];

	protected $fillable = [
		'STATE_NAME',
		'STATE_TYPE_ID_STATE_TYPE'
	];

	public function state_type()
	{
		return $this->belongsTo(\App\Models\StateType::class, 'STATE_TYPE_ID_STATE_TYPE');
	}

	public function eval_reports()
	{
		return $this->hasMany(\App\Models\EvalReport::class, 'STATE_ID_STATE');
	}

	public function outcomes()
	{
		return $this->hasMany(\App\Models\Outcome::class, 'STATE_ID_STATE');
	}

	public function plan_smcs()
	{
		return $this->hasMany(\App\Models\PlanSmc::class, 'STATE_ID_STATE');
	}

	public function role_cips()
	{
		return $this->hasMany(\App\Models\RoleCip::class, 'STATE_ID_STATE');
	}

	public function user_cips()
	{
		return $this->hasMany(\App\Models\UserCip::class, 'STATE_ID_STATE');
	}
}
