<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ComplSrc
 * 
 * @property int $ID_COMPL_SRC
 * @property int $PLAN_ID_PLAN
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\PlanSmc $plan_smc
 * @property \Illuminate\Database\Eloquent\Collection $methods
 *
 * @package App\Models
 */
class ComplSrc extends Eloquent
{
	protected $table = 'compl_src';
	protected $primaryKey = 'ID_COMPL_SRC';

	protected $casts = [
		'PLAN_ID_PLAN' => 'int'
	];

	protected $fillable = [
		'PLAN_ID_PLAN'
	];

	public function plan_smc()
	{
		return $this->belongsTo(\App\Models\PlanSmc::class, 'PLAN_ID_PLAN');
	}

	public function methods()
	{
		return $this->hasMany(\App\Models\Method::class, 'COMPL_SRC_ID_COMPL_SRC');
	}
}
