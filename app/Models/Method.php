<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Method
 * 
 * @property int $ID_AS_METHOD
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DIRECT
 * @property int $COMPL_SRC_ID_COMPL_SRC
 * @property string $SHORT_DESCRIPTION
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\ComplSrc $compl_src
 * @property \Illuminate\Database\Eloquent\Collection $as_srcs
 *
 * @package App\Models
 */
class Method extends Eloquent
{
	protected $table = 'method';
	protected $primaryKey = 'ID_AS_METHOD';

	protected $casts = [
		'COMPL_SRC_ID_COMPL_SRC' => 'int'
	];

	protected $fillable = [
		'NAME',
		'DESCRIPTION',
		'DIRECT',
		'COMPL_SRC_ID_COMPL_SRC',
		'SHORT_DESCRIPTION'
	];

	public function compl_src()
	{
		return $this->belongsTo(\App\Models\ComplSrc::class, 'COMPL_SRC_ID_COMPL_SRC');
	}

	public function as_srcs()
	{
		return $this->hasMany(\App\Models\AsSrc::class, 'METHOD_ID_AS_METHOD');
	}
}
