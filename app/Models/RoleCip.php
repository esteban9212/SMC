<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleCip
 * 
 * @property string $NAME
 * @property int $ID_ROLE
 * @property int $STATE_ID_STATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'STATE_ID_STATE' => 'int'
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
					->withPivot('ID_USER_CIP_ROLE')
					->withTimestamps();
	}
}
