<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutcomeLog
 * 
 * @property int $ID_OUTCOME_LOG
 * @property string $CRITERION
 * @property string $DESCRIPTION
 * @property int $ID_PROGRAM
 * @property string $SHORT_DESCRIPTION
 * @property int $ID_USER
 * @property int $ID_STATE
 * @property string $LOG_ACTION
 * @property \Carbon\Carbon $ACTION_DATE
 * @property int $LAST_ID_USER
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class OutcomeLog extends Eloquent
{
	protected $table = 'outcome_log';
	protected $primaryKey = 'ID_OUTCOME_LOG';

	protected $casts = [
		'ID_PROGRAM' => 'int',
		'ID_USER' => 'int',
		'ID_STATE' => 'int',
		'LAST_ID_USER' => 'int'
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
