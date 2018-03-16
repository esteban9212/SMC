<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserCipRoleCip
 * 
 * @property int $ROLE_CIP_ID_ROLE
 * @property int $USER_CIP_ID_USER
 * @property int $ID_USER_CIP_ROLE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'ROLE_CIP_ID_ROLE' => 'int',
		'USER_CIP_ID_USER' => 'int'
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
