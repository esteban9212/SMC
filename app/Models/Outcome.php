<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Outcome
 * 
 * @property float $ID_ST_OUTCOME
 * @property string $CRITERION
 * @property string $DESCRIPTION
 * @property string $PROGRAM_ID_PROGRAM
 * @property string $SHORT_DESCRIPTION
 * @property float $USER_CIP_ID_USER
 * @property float $STATE_ID_STATE
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_ST_OUTCOME' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'STATE_ID_STATE' => 'float'
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
					->withPivot('OUTCOME_PEO');
	}
}
