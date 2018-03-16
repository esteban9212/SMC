<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ParamSmc
 * 
 * @property string $PARAMETER_NAME
 * @property string $PARAMETER_DESCRIPTION
 * @property string $TEXT_VALUE
 * @property int $INITIAL_NUMERIC_VALUE
 * @property int $FINAL_NUMERIC_VALUE
 * @property \Carbon\Carbon $INITIAL_DATE_VALUE
 * @property \Carbon\Carbon $FINAL_DATE_VALUE
 * @property boolean $BLOB_VALUE
 * @property string $CLOB_VALUE
 * @property string $DATA_TYPE
 * @property int $ID_PARAMETER
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ParamSmc extends Eloquent
{
	protected $table = 'param_smc';
	protected $primaryKey = 'ID_PARAMETER';

	protected $casts = [
		'INITIAL_NUMERIC_VALUE' => 'int',
		'FINAL_NUMERIC_VALUE' => 'int',
		'BLOB_VALUE' => 'boolean'
	];

	protected $dates = [
		'INITIAL_DATE_VALUE',
		'FINAL_DATE_VALUE'
	];

	protected $fillable = [
		'PARAMETER_NAME',
		'PARAMETER_DESCRIPTION',
		'TEXT_VALUE',
		'INITIAL_NUMERIC_VALUE',
		'FINAL_NUMERIC_VALUE',
		'INITIAL_DATE_VALUE',
		'FINAL_DATE_VALUE',
		'BLOB_VALUE',
		'CLOB_VALUE',
		'DATA_TYPE'
	];
}
