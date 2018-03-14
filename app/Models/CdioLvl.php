<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CdioLvl
 * 
 * @property float $ID_CDIO_LVL
 * @property string $SYMBOL
 * @property string $DESCRIPTION
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cdio_course_mtxes
 *
 * @package App\Models
 */
class CdioLvl extends Eloquent
{
	protected $table = 'cdio_lvl';
	protected $primaryKey = 'ID_CDIO_LVL';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_CDIO_LVL' => 'float'
	];

	protected $fillable = [
		'SYMBOL',
		'DESCRIPTION'
	];

	public function cdio_course_mtxes()
	{
		return $this->hasMany(\App\Models\CdioCourseMtx::class, 'ID_CDIO_LVL');
	}
}
