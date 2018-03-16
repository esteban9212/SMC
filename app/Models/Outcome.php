<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Outcome
 * 
 * @property int $ID_ST_OUTCOME
 * @property string $CRITERION
 * @property string $DESCRIPTION
 * @property string $PROGRAM_ID_PROGRAM
 * @property string $SHORT_DESCRIPTION
 * @property int $USER_CIP_ID_USER
 * @property int $STATE_ID_STATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\ProgramSmc $program_smc
 * @property \App\Models\StateSmc $state_smc
 * @property \App\Models\UserCip $user_cip
 * @property \Illuminate\Database\Eloquent\Collection $cdio_outcome_mtxes
 * @property \Illuminate\Database\Eloquent\Collection $outcome_cycle_as
 * @property \Illuminate\Database\Eloquent\Collection $peos
 *
 * @package App\Models
 */
class Outcome extends Eloquent
{
	protected $table = 'outcome';
	protected $primaryKey = 'ID_ST_OUTCOME';

	protected $casts = [
		'USER_CIP_ID_USER' => 'int',
		'STATE_ID_STATE' => 'int'
	];

	protected $fillable = [
		'CRITERION',
		'DESCRIPTION',
		'PROGRAM_ID_PROGRAM',
		'SHORT_DESCRIPTION',
		'USER_CIP_ID_USER',
		'STATE_ID_STATE'
	];

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM_ID_PROGRAM');
	}

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}

	public function cdio_outcome_mtxes()
	{
		return $this->hasMany(\App\Models\CdioOutcomeMtx::class, 'ID_ST_OUTCOME');
	}

	public function outcome_cycle_as()
	{
		return $this->hasMany(\App\Models\OutcomeCycleA::class, 'OUTCOME_ID_ST_OUTCOME');
	}

	public function peos()
	{
		return $this->belongsToMany(\App\Models\Peo::class, 'outcome_peo_mtx', 'OUTCOME_ID_ST_OUTCOME', 'PEO_ID_PEO')
					->withPivot('OUTCOME_PEO')
					->withTimestamps();
	}
}
