<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cdio
 * 
 * @property int $ID_CDIO
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cdio_skills
 *
 * @package App\Models
 */
class Cdio extends Eloquent
{
	protected $table = 'cdio';
	protected $primaryKey = 'ID_CDIO';

	protected $fillable = [
		'NAME',
		'DESCRIPTION'
	];

	public function cdio_skills()
	{
		return $this->hasMany(\App\Models\CdioSkill::class, 'CDIO_ID_CDIO');
	}
}
