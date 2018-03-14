<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cdio
 * 
 * @property float $ID_CDIO
 * @property string $NAME
 * @property string $DESCRIPTION
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cdio_skills
 *
 * @package App\Models
 */
class Cdio extends Eloquent
{
	protected $table = 'cdio';
	protected $primaryKey = 'ID_CDIO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_CDIO' => 'float'
	];

	protected $fillable = [
		'NAME',
		'DESCRIPTION'
	];

	public function cdio_skills()
	{
		return $this->hasMany(\App\Models\CdioSkill::class, 'CDIO_ID_CDIO');
	}
}
