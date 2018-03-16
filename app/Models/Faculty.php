<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Faculty
 * 
 * @property string $CODE
 * @property int $ID_FACULTY
 * @property string $NAME
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $faculty_users
 * @property \Illuminate\Database\Eloquent\Collection $program_smcs
 *
 * @package App\Models
 */
class Faculty extends Eloquent
{
	protected $table = 'faculty';
	protected $primaryKey = 'ID_FACULTY';

	protected $fillable = [
		'CODE',
		'NAME'
	];

	public function faculty_users()
	{
		return $this->hasMany(\App\Models\FacultyUser::class, 'FACULTY_ID_FACULTY');
	}

	public function program_smcs()
	{
		return $this->hasMany(\App\Models\ProgramSmc::class, 'FACULTY_ID_FACULTY');
	}
}
