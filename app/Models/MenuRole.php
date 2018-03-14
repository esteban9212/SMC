<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MenuRole
 * 
 * @property float $ROLE_CIP_ID_ROLE
 * @property float $MENU_ID_MENU
 * @property float $ID_MENU_ROL
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ROLE_CIP_ID_ROLE' => 'float',
		'MENU_ID_MENU' => 'float',
		'ID_MENU_ROL' => 'float'
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
