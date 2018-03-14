<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ComplSrc
 * 
 * @property float $ID_COMPL_SRC
 * @property float $PLAN_ID_PLAN
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_COMPL_SRC' => 'float',
		'PLAN_ID_PLAN' => 'float'
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
