<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Confiq
 * 
 * @property int $id
 * @property string $name
 * @property int $room_id
 * @property string $furniture
 * @property int $place_x
 * @property int $place_y
 * 
 * @property \App\Models\Room $room
 *
 * @package App\Models
 */
class Confiq extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'place_x' => 'int',
		'place_y' => 'int'
	];

	protected $fillable = [
		'furniture',
		'place_x',
		'place_y'
	];

	public function room()
	{
		return $this->belongsTo(\App\Models\Room::class);
	}
}
