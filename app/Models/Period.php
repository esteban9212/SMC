<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Period
 * 
 * @property float $ID_PERIOD
 * @property string $NAME_PERIOD
 * 
 * @property \Illuminate\Database\Eloquent\Collection $peos
 *
 * @package App\Models
 */
class Period extends Eloquent
{
	protected $table = 'period';
	protected $primaryKey = 'ID_PERIOD';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PERIOD' => 'float'
	];

	protected $fillable = [
		'NAME_PERIOD'
	];

	public function peos()
	{
		return $this->hasMany(\App\Models\Peo::class, 'APPLICATION_DATE');
	}
}
