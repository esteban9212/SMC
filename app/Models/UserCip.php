<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class UserCip
 * 
 * @property int $ID_USER
 * @property string $NAME_USER
 * @property string $LAST_NAME
 * @property string $EMAIL
 * @property string $IDENTIFICATION
 * @property string $LOGIN
 * @property string $PASSWORD_USER
 * @property int $STATE_ID_STATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\StateSmc $state_smc
 * @property \Illuminate\Database\Eloquent\Collection $block_courses
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
class UserCip extends Authenticatable
{
	protected $table = 'user_cip';
	protected $primaryKey = 'ID_USER';

	protected $casts = [
		'STATE_ID_STATE' => 'int'
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

	public function block_courses()
	{
		return $this->hasMany(\App\Models\BlockCourse::class, 'USER_CIP_ID_USER');
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
					->withPivot('ID_USER_CIP_ROLE')
					->withTimestamps();
	}

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->PASSWORD_USER;
    }
}
