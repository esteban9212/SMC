<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MenuRole
 * 
 * @property int $ROLE_CIP_ID_ROLE
 * @property int $MENU_ID_MENU
 * @property int $ID_MENU_ROL
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Menu $menu
 * @property \App\Models\RoleCip $role_cip
 *
 * @package App\Models
 */
class MenuRole extends Eloquent
{
	protected $table = 'menu_role';
	protected $primaryKey = 'ID_MENU_ROL';

	protected $casts = [
		'ROLE_CIP_ID_ROLE' => 'int',
		'MENU_ID_MENU' => 'int'
	];

	protected $fillable = [
		'ROLE_CIP_ID_ROLE',
		'MENU_ID_MENU'
	];

	public function menu()
	{
		return $this->belongsTo(\App\Models\Menu::class, 'MENU_ID_MENU');
	}

	public function role_cip()
	{
		return $this->belongsTo(\App\Models\RoleCip::class, 'ROLE_CIP_ID_ROLE');
	}
}
