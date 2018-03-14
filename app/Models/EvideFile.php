<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EvideFile
 * 
 * @property float $ID_FILE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property boolean $FILE_RAW
 * @property float $ID_AS_SRC
 * @property float $ID_USER
 * @property \Carbon\Carbon $LOAD_DATE
 * 
 * @property \App\Models\AsSrc $as_src
 * @property \App\Models\UserCip $user_cip
 *
 * @package App\Models
 */
class EvideFile extends Eloquent
{
	protected $table = 'evide_file';
	protected $primaryKey = 'ID_FILE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_FILE' => 'float',
		'FILE_RAW' => 'boolean',
		'ID_AS_SRC' => 'float',
		'ID_USER' => 'float'
	];

	protected $dates = [
		'LOAD_DATE'
	];

	protected $fillable = [
		'NAME',
		'DESCRIPTION',
		'FILE_RAW',
		'ID_AS_SRC',
		'ID_USER',
		'LOAD_DATE'
	];

	public function as_src()
	{
		return $this->belongsTo(\App\Models\AsSrc::class, 'ID_AS_SRC');
	}

	public function user_cip()
	{
		return $this->belongsTo(\App\Models\UserCip::class, 'ID_USER');
	}
}
