<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserCipRoleCip
 * 
 * @property float $ROLE_CIP_ID_ROLE
 * @property float $USER_CIP_ID_USER
 * @property float $ID_USER_CIP_ROLE
 * 
 * @property \App\Models\RoleCip $role_cip
 * @property \App\Models\UserCip $user_cip
 *
 * @package App\Models
 */
class UserCipRoleCip extends Eloquent
{
	protected $table = 'user_cip_role_cip';
	protected $primaryKey = 'ID_USER_CIP_ROLE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ROLE_CIP_ID_ROLE' => 'float',
		'USER_CIP_ID_USER' => 'float',
		'ID_USER_CIP_ROLE' => 'float'
	];

	protected $fillable = [
		'ROLE_CIP_ID_ROLE',
		'USER_CIP_ID_USER'
	];

	public function role_cip()
	{
		return $this->belongsTo(\App\Models\RoleCip::class, 'ROLE_CIP_ID_ROLE');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'USER_CIP_ID_USER');
	}
}
