<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Mar 2018 02:33:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property int $ID_MENU
 * @property string $MENU_NAME
 * @property string $URL
 * @property string $TIPO
 * @property int $ID_MENU_PADRE
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

	protected $casts = [
		'ID_MENU_PADRE' => 'int'
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
