<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssessmentPlanLog
 * 
 * @property int $ID_ASSESSMENT_PLAN_LOG
 * @property \Carbon\Carbon $CREATION_DATE
 * @property int $ID_USER
 * @property \Carbon\Carbon $EVALUATION_DATE
 * @property string $EVALUATION_FREQUENCY
 * @property int $ID_PERIOD
 * @property int $ID_STATE
 * @property int $ID_CYCLE
 * @property int $ID_STUDENT_OUTCOME
 * @property string $LOG_ACTION
 * @property \Carbon\Carbon $ACTION_DATE
 * @property int $LAST_ID_STATE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AssessmentPlanLog extends Eloquent
{
	protected $table = 'assessment_plan_log';
	protected $primaryKey = 'ID_ASSESSMENT_PLAN_LOG';

	protected $casts = [
		'ID_USER' => 'int',
		'ID_PERIOD' => 'int',
		'ID_STATE' => 'int',
		'ID_CYCLE' => 'int',
		'ID_STUDENT_OUTCOME' => 'int',
		'LAST_ID_STATE' => 'int'
	];

	protected $dates = [
		'CREATION_DATE',
		'EVALUATION_DATE',
		'ACTION_DATE'
	];

	protected $fillable = [
		'CREATION_DATE',
		'ID_USER',
		'EVALUATION_DATE',
		'EVALUATION_FREQUENCY',
		'ID_PERIOD',
		'ID_STATE',
		'ID_CYCLE',
		'ID_STUDENT_OUTCOME',
		'LOG_ACTION',
		'ACTION_DATE',
		'LAST_ID_STATE'
	];
}
