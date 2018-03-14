<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Peo
 * 
 * @property float $ID_PEO
 * @property string $DESCRIPTION
 * @property float $TERM
 * @property string $PROGRAM_ID_PROGRAM
 * @property float $APPLICATION_DATE
 * 
 * @property \App\Models\Period $period
 * @property \App\Models\ProgramSmc $program_smc
 * @property \Illuminate\Database\Eloquent\Collection $outcomes
 *
 * @package App\Models
 */
class Peo extends Eloquent
{
	protected $table = 'peo';
	protected $primaryKey = 'ID_PEO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PEO' => 'float',
		'TERM' => 'float',
		'APPLICATION_DATE' => 'float'
	];

	protected $fillable = [
		'DESCRIPTION',
		'TERM',
		'PROGRAM_ID_PROGRAM',
		'APPLICATION_DATE'
	];

	public function period()
	{
		return $this->belongsTo(\App\Models\Period::class, 'APPLICATION_DATE');
	}

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM_ID_PROGRAM');
	}

	public function outcomes()
	{
		return $this->belongsToMany(\App\Models\Outcome::class, 'outcome_peo_mtx', 'PEO_ID_PEO', 'OUTCOME_ID_ST_OUTCOME')
					->withPivot('OUTCOME_PEO');
	}
}
