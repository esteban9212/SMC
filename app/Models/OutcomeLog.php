<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomeLog
 * 
 * @property float $ID_OUTCOME_LOG
 * @property string $CRITERION
 * @property string $DESCRIPTION
 * @property float $ID_PROGRAM
 * @property string $SHORT_DESCRIPTION
 * @property float $ID_USER
 * @property float $ID_STATE
 * @property string $LOG_ACTION
 * @property \Carbon\Carbon $ACTION_DATE
 * @property float $LAST_ID_USER
 *
 * @package App\Models
 */
class OutcomeLog extends Eloquent
{
	protected $table = 'outcome_log';
	protected $primaryKey = 'ID_OUTCOME_LOG';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_OUTCOME_LOG' => 'float',
		'ID_PROGRAM' => 'float',
		'ID_USER' => 'float',
		'ID_STATE' => 'float',
		'LAST_ID_USER' => 'float'
	];

	protected $dates = [
		'ACTION_DATE'
	];

	protected $fillable = [
		'CRITERION',
		'DESCRIPTION',
		'ID_PROGRAM',
		'SHORT_DESCRIPTION',
		'ID_USER',
		'ID_STATE',
		'LOG_ACTION',
		'ACTION_DATE',
		'LAST_ID_USER'
	];
}
