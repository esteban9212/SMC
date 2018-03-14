<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Faculty
 * 
 * @property string $CODE
 * @property float $ID_FACULTY
 * @property string $NAME
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_FACULTY' => 'float'
	];

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
