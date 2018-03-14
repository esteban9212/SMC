<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomePeoMtx
 * 
 * @property float $PEO_ID_PEO
 * @property float $OUTCOME_ID_ST_OUTCOME
 * @property float $OUTCOME_PEO
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PEO_ID_PEO' => 'float',
		'OUTCOME_ID_ST_OUTCOME' => 'float',
		'OUTCOME_PEO' => 'float'
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
