<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MainCycle
 * 
 * @property int $DURATION
 * @property float $ID_CYCLE
 * @property string $CYCLE_NAME
 * @property string $PROGRAM_ID_PROGRAM
 * @property string $INITIAL_DATE_CYCLE
 * @property string $FINAL_DATE_CYCLE
 * @property float $MAIN_CYCLE_ID_CYCLE
 * 
 * @property \App\Models\MainCycle $main_cycle
 * @property \App\Models\ProgramSmc $program_smc
 * @property \Illuminate\Database\Eloquent\Collection $eval_cycles
 * @property \Illuminate\Database\Eloquent\Collection $main_cycles
 * @property \Illuminate\Database\Eloquent\Collection $outcome_cycle_as
 *
 * @package App\Models
 */
class MainCycle extends Eloquent
{
	protected $table = 'main_cycle';
	protected $primaryKey = 'ID_CYCLE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'DURATION' => 'int',
		'ID_CYCLE' => 'float',
		'MAIN_CYCLE_ID_CYCLE' => 'float'
	];

	protected $fillable = [
		'DURATION',
		'CYCLE_NAME',
		'PROGRAM_ID_PROGRAM',
		'INITIAL_DATE_CYCLE',
		'FINAL_DATE_CYCLE',
		'MAIN_CYCLE_ID_CYCLE'
	];

	public function main_cycle()
	{
		return $this->belongsTo(\App\Models\MainCycle::class, 'MAIN_CYCLE_ID_CYCLE');
	}

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM_ID_PROGRAM');
	}

	public function eval_cycles()
	{
		return $this->hasMany(\App\Models\EvalCycle::class, 'MAIN_CYCLE_ID_CYCLE');
	}

	public function main_cycles()
	{
		return $this->hasMany(\App\Models\MainCycle::class, 'MAIN_CYCLE_ID_CYCLE');
	}

	public function outcome_cycle_as()
	{
		return $this->hasMany(\App\Models\OutcomeCycleA::class, 'MAIN_CYCLE_ID_CYCLE');
	}
}
