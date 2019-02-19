<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Reservation
 * 
 * @property int $room_id
 * @property \Carbon\Carbon $created_when
 * @property \Carbon\Carbon $updated_at
 * @property int $rekv_id
 * @property int $res_module
 * @property \Carbon\Carbon $res_date
 * @property int $bookers_u_id
 * 
 * @property \App\Models\Rekvirent $rekvirent
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Reservation extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'rekv_id' => 'int',
		'res_module' => 'int',
		'bookers_u_id' => 'int'
	];

	protected $dates = [
		'created_when',
		'res_date'
	];

	protected $fillable = [
		'created_when',
		'rekv_id',
		'bookers_u_id'
	];

	public function rekvirent()
	{
		return $this->belongsTo(\App\Models\Rekvirent::class, 'rekv_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'bookers_u_id');
	}
}
