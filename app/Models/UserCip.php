<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserCip
 * 
 * @property float $ID_USER
 * @property string $NAME_USER
 * @property string $LAST_NAME
 * @property string $EMAIL
 * @property string $IDENTIFICATION
 * @property string $LOGIN
 * @property string $PASSWORD_USER
 * @property float $STATE_ID_STATE
 * 
 * @property \App\Models\StateSmc $state_smc
 * @property \Illuminate\Database\Eloquent\Collection $course_professors
 * @property \Illuminate\Database\Eloquent\Collection $eval_reports
 * @property \Illuminate\Database\Eloquent\Collection $evide_files
 * @property \Illuminate\Database\Eloquent\Collection $faculty_users
 * @property \Illuminate\Database\Eloquent\Collection $outcomes
 * @property \Illuminate\Database\Eloquent\Collection $plan_smcs
 * @property \Illuminate\Database\Eloquent\Collection $program_smcs
 * @property \Illuminate\Database\Eloquent\Collection $user_as_srcs
 * @property \Illuminate\Database\Eloquent\Collection $role_cips
 *
 * @package App\Models
 */
class UserCip extends Eloquent
{
	protected $table = 'user_cip';
	protected $primaryKey = 'ID_USER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_USER' => 'float',
		'STATE_ID_STATE' => 'float'
	];

	protected $fillable = [
		'NAME_USER',
		'LAST_NAME',
		'EMAIL',
		'IDENTIFICATION',
		'LOGIN',
		'PASSWORD_USER',
		'STATE_ID_STATE'
	];

	public function state_smc()
	{
		return $this->belongsTo(\App\Models\StateSmc::class, 'STATE_ID_STATE');
	}

	public function course_professors()
	{
		return $this->hasMany(\App\Models\CourseProfessor::class, 'USER_CIP_ID_USER');
	}

	public function eval_reports()
	{
		return $this->hasMany(\App\Models\EvalReport::class, 'USER_CIP_ID_USER');
	}

	public function evide_files()
	{
		return $this->hasMany(\App\Models\EvideFile::class, 'ID_USER');
	}

	public function faculty_users()
	{
		return $this->hasMany(\App\Models\FacultyUser::class, 'USER_CIP_ID_USER');
	}

	public function outcomes()
	{
		return $this->hasMany(\App\Models\Outcome::class, 'USER_CIP_ID_USER');
	}

	public function plan_smcs()
	{
		return $this->hasMany(\App\Models\PlanSmc::class, 'USER_CIP_ID_USER');
	}

	public function program_smcs()
	{
		return $this->hasMany(\App\Models\ProgramSmc::class, 'USER_CIP_ID_USER');
	}

	public function user_as_srcs()
	{
		return $this->hasMany(\App\Models\UserAsSrc::class, 'SRC_USER_ID');
	}

	public function role_cips()
	{
		return $this->belongsToMany(\App\Models\RoleCip::class, 'user_cip_role_cip', 'USER_CIP_ID_USER', 'ROLE_CIP_ID_ROLE')
					->withPivot('ID_USER_CIP_ROLE');
	}
}
