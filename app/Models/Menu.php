<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 15:08:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property float $ID_MENU
 * @property string $MENU_NAME
 * @property string $URL
 * @property string $TIPO
 * @property float $ID_MENU_PADRE
 * 
 * @property \App\Models\Menu $menu
 * @property \Illuminate\Database\Eloquent\Collection $menus
 * @property \Illuminate\Database\Eloquent\Collection $menu_roles
 *
 * @package App\Models
 */
class Menu extends Eloquent
{
	protected $table = 'menu';
	protected $primaryKey = 'ID_MENU';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_MENU' => 'float',
		'ID_MENU_PADRE' => 'float'
	];

	protected $fillable = [
		'MENU_NAME',
		'URL',
		'TIPO',
		'ID_MENU_PADRE'
	];

	public function menu()
	{
		return $this->belongsTo(\App\Models\Menu::class, 'ID_MENU_PADRE');
	}

	public function menus()
	{
		return $this->hasMany(\App\Models\Menu::class, 'ID_MENU_PADRE');
	}

	public function menu_roles()
	{
		return $this->hasMany(\App\Models\MenuRole::class, 'MENU_ID_MENU');
	}
}
