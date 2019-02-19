<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Room
 * 
 * @property int $id
 * @property string $type
 * @property int $depth
 * @property int $width
 * @property string $ent_direction
 * @property int $ent_location
 * @property string $board_direction
 * 
 * @property \Illuminate\Database\Eloquent\Collection $confiqs
 *
 * @package App\Models
 */
class Room extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'depth' => 'int',
		'width' => 'int',
		'ent_location' => 'int'
	];

	protected $fillable = [
		'type',
		'depth',
		'width',
		'ent_direction',
		'ent_location',
		'board_direction'
	];

	public function confiqs()
	{
		return $this->hasMany(\App\Models\Confiq::class);
	}
}
