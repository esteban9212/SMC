<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioOutcomeMtx
 * 
 * @property int $ID_ST_OUTCOME
 * @property int $ID_CDIO_SKILL
 * @property string $VERSION
 * @property int $ID_MTX_OUTCOME_CDIO
 * @property string $PROGRAM
 * @property int $CORRELATION
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'ID_ST_OUTCOME' => 'int',
		'ID_CDIO_SKILL' => 'int',
		'CORRELATION' => 'int'
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
