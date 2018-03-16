<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Peo
 * 
 * @property int $ID_PEO
 * @property string $DESCRIPTION
 * @property int $TERM
 * @property string $PROGRAM_ID_PROGRAM
 * @property int $APPLICATION_DATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'TERM' => 'int',
		'APPLICATION_DATE' => 'int'
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
					->withPivot('OUTCOME_PEO')
					->withTimestamps();
	}
}
