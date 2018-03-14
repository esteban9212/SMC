<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Method
 * 
 * @property float $ID_AS_METHOD
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DIRECT
 * @property float $COMPL_SRC_ID_COMPL_SRC
 * @property string $SHORT_DESCRIPTION
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_AS_METHOD' => 'float',
		'COMPL_SRC_ID_COMPL_SRC' => 'float'
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
