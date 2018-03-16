<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Period
 * 
 * @property int $ID_PERIOD
 * @property string $NAME_PERIOD
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $peos
 *
 * @package App\Models
 */
class Period extends Eloquent
{
	protected $table = 'period';
	protected $primaryKey = 'ID_PERIOD';

	protected $fillable = [
		'NAME_PERIOD'
	];

	public function peos()
	{
		return $this->hasMany(\App\Models\Peo::class, 'APPLICATION_DATE');
	}
}
