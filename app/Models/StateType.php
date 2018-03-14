<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StateType
 * 
 * @property float $ID_STATE_TYPE
 * @property string $STATE_TYPE_NAME
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $state_smcs
 *
 * @package App\Models
 */
class StateType extends Eloquent
{
	protected $table = 'state_type';
	protected $primaryKey = 'ID_STATE_TYPE';
	public $incrementing = false;

	protected $casts = [
		'ID_STATE_TYPE' => 'float'
	];

	protected $fillable = ['ID_STATE_TYPE','STATE_TYPE_NAME'];

	public function state_smcs()
	{
		return $this->hasMany(\App\Models\StateSmc::class, 'STATE_TYPE_ID_STATE_TYPE');
	}
}
