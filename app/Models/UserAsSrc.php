<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserAsSrc
 * 
 * @property int $ID_USER_AS_SRC
 * @property float $SRC_USER_ID
 * @property float $AS_SRC_ID
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_USER_AS_SRC' => 'int',
		'SRC_USER_ID' => 'float',
		'AS_SRC_ID' => 'float'
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
