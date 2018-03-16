<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EvideFile
 * 
 * @property int $ID_FILE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property boolean $FILE_RAW
 * @property int $ID_AS_SRC
 * @property int $ID_USER
 * @property \Carbon\Carbon $LOAD_DATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'FILE_RAW' => 'boolean',
		'ID_AS_SRC' => 'int',
		'ID_USER' => 'int'
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
