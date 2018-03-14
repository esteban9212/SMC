<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RubricFile
 * 
 * @property float $ID_FILE
 * @property string $FILE_NAME
 * @property string $DECRIPTION
 * @property boolean $FILE_RAW
 * 
 * @property \Illuminate\Database\Eloquent\Collection $eval_reports
 * @property \Illuminate\Database\Eloquent\Collection $plan_smcs
 *
 * @package App\Models
 */
class RubricFile extends Eloquent
{
	protected $table = 'rubric_file';
	protected $primaryKey = 'ID_FILE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_FILE' => 'float',
		'FILE_RAW' => 'boolean'
	];

	protected $fillable = [
		'FILE_NAME',
		'DECRIPTION',
		'FILE_RAW'
	];

	public function eval_reports()
	{
		return $this->hasMany(\App\Models\EvalReport::class, 'STATISTIC');
	}

	public function plan_smcs()
	{
		return $this->hasMany(\App\Models\PlanSmc::class, 'ID_RUBRIC_FILE');
	}
}
