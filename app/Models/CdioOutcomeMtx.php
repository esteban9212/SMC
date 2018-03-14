<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioOutcomeMtx
 * 
 * @property float $ID_ST_OUTCOME
 * @property float $ID_CDIO_SKILL
 * @property string $VERSION
 * @property float $ID_MTX_OUTCOME_CDIO
 * @property string $PROGRAM
 * @property float $CORRELATION
 * 
 * @property \App\Models\CdioSkill $cdio_skill
 * @property \App\Models\Outcome $outcome
 * @property \App\Models\ProgramSmc $program_smc
 *
 * @package App\Models
 */
class CdioOutcomeMtx extends Eloquent
{
	protected $table = 'cdio_outcome_mtx';
	protected $primaryKey = 'ID_MTX_OUTCOME_CDIO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_ST_OUTCOME' => 'float',
		'ID_CDIO_SKILL' => 'float',
		'ID_MTX_OUTCOME_CDIO' => 'float',
		'CORRELATION' => 'float'
	];

	protected $fillable = [
		'ID_ST_OUTCOME',
		'ID_CDIO_SKILL',
		'VERSION',
		'PROGRAM',
		'CORRELATION'
	];

	public function cdio_skill()
	{
		return $this->belongsTo(\App\Models\CdioSkill::class, 'ID_CDIO_SKILL');
	}

	public function outcome()
	{
		return $this->belongsTo(\App\Models\Outcome::class, 'ID_ST_OUTCOME');
	}

	public function program_smc()
	{
		return $this->belongsTo(\App\Models\ProgramSmc::class, 'PROGRAM');
	}
}
