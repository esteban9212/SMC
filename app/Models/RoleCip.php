<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleCip
 * 
 * @property string $NAME
 * @property float $ID_ROLE
 * @property float $STATE_ID_STATE
 * 
 * @property \App\Models\StateSmc $state_smc
 * @property \Illuminate\Database\Eloquent\Collection $menu_roles
 * @property \Illuminate\Database\Eloquent\Collection $user_cips
 *
 * @package App\Models
 */
class RoleCip extends Eloquent
{
	protected $table = 'role_cip';
	protected $primaryKey = 'ID_ROLE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_ROLE' => 'float',
		'STATE_ID_STATE' => 'float'
	];

	protected $fillable = [
		'NAME',
		'STATE_ID_STATE'
	];

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}

	public function menu_roles()
	{
		return $this->hasMany(\App\Models\MenuRole::class, 'ROLE_CIP_ID_ROLE');
	}

	public function user_cips()
	{
		return $this->belongsToMany(\App\Models\UserCip::class, 'user_cip_role_cip', 'ROLE_CIP_ID_ROLE', 'USER_CIP_ID_USER')
					->withPivot('ID_USER_CIP_ROLE');
	}
}
