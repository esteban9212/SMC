<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioLvl
 * 
 * @property int $ID_CDIO_LVL
 * @property string $SYMBOL
 * @property string $DESCRIPTION
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cdio_course_mtxes
 *
 * @package App\Models
 */
class CdioLvl extends Eloquent
{
	protected $table = 'cdio_lvl';
	protected $primaryKey = 'ID_CDIO_LVL';

	protected $fillable = [
		'SYMBOL',
		'DESCRIPTION'
	];

	public function cdio_course_mtxes()
	{
		return $this->hasMany(\App\Models\CdioCourseMtx::class, 'ID_CDIO_LVL');
	}
}
