<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomePeoMtx
 * 
 * @property int $PEO_ID_PEO
 * @property int $OUTCOME_ID_ST_OUTCOME
 * @property int $OUTCOME_PEO
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Outcome $outcome
 * @property \App\Models\Peo $peo
 *
 * @package App\Models
 */
class OutcomePeoMtx extends Eloquent
{
	protected $table = 'outcome_peo_mtx';
	protected $primaryKey = 'OUTCOME_PEO';

	protected $casts = [
		'PEO_ID_PEO' => 'int',
		'OUTCOME_ID_ST_OUTCOME' => 'int'
	];

	protected $fillable = [
		'PEO_ID_PEO',
		'OUTCOME_ID_ST_OUTCOME'
	];

	public function outcome()
	{
		return $this->belongsTo(\App\Models\Outcome::class, 'OUTCOME_ID_ST_OUTCOME');
	}

	public function peo()
	{
		return $this->belongsTo(\App\Models\Peo::class, 'PEO_ID_PEO');
	}
}
