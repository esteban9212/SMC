<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AsSrc
 * 
 * @property int $ID_AS_SRC
 * @property int $USER_CIP_ID_USER
 * @property int $COURSE_ID_COURSE
 * @property int $PI_ID_PI
 * @property int $METHOD_ID_AS_METHOD
 * @property \Carbon\Carbon $COLLECTION_DATE
 * @property string $COLLECTION_FREQUENCY
 * @property string $METHODOLOGY
 * @property int $POPULATION
 * @property string $RESULT
 * @property string $IMPROVEMENT
 * @property string $ASSIGNED
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\Method $method
 * @property \App\Models\PiSmc $pi_smc
 * @property \Illuminate\Database\Eloquent\Collection $evide_files
 * @property \Illuminate\Database\Eloquent\Collection $user_as_srcs
 *
 * @package App\Models
 */
class AsSrc extends Eloquent
{
	protected $table = 'as_src';
	protected $primaryKey = 'ID_AS_SRC';

	protected $casts = [
		'USER_CIP_ID_USER' => 'int',
		'COURSE_ID_COURSE' => 'int',
		'PI_ID_PI' => 'int',
		'METHOD_ID_AS_METHOD' => 'int',
		'POPULATION' => 'int'
	];

	protected $dates = [
		'COLLECTION_DATE'
	];

	protected $fillable = [
		'USER_CIP_ID_USER',
		'COURSE_ID_COURSE',
		'PI_ID_PI',
		'METHOD_ID_AS_METHOD',
		'COLLECTION_DATE',
		'COLLECTION_FREQUENCY',
		'METHODOLOGY',
		'POPULATION',
		'RESULT',
		'IMPROVEMENT',
		'ASSIGNED'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'COURSE_ID_COURSE');
	}

	public function method()
	{
		return $this->belongsTo(\App\Models\Method::class, 'METHOD_ID_AS_METHOD');
	}

	public function pi_smc()
	{
		return $this->belongsTo(\App\Models\PiSmc::class, 'PI_ID_PI');
	}

	public function evide_files()
	{
		return $this->hasMany(\App\Models\EvideFile::class, 'ID_AS_SRC');
	}

	public function user_as_srcs()
	{
		return $this->hasMany(\App\Models\UserAsSrc::class, 'AS_SRC_ID');
	}
}
