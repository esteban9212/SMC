<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserAsSrc
 * 
 * @property int $ID_USER_AS_SRC
 * @property int $SRC_USER_ID
 * @property int $AS_SRC_ID
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\AsSrc $as_src
 * @property \App\Models\UserCip $user_cip
 *
 * @package App\Models
 */
class UserAsSrc extends Eloquent
{
	protected $table = 'user_as_src';
	protected $primaryKey = 'ID_USER_AS_SRC';

	protected $casts = [
		'SRC_USER_ID' => 'int',
		'AS_SRC_ID' => 'int'
	];

	protected $fillable = [
		'SRC_USER_ID',
		'AS_SRC_ID'
	];

	public function as_src()
	{
		return $this->belongsTo(\App\Models\AsSrc::class, 'AS_SRC_ID');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'SRC_USER_ID');
	}
}
