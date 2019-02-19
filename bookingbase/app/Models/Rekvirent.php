<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rekvirent
 * 
 * @property int $id
 * @property int $user_id
 * @property string $class_id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Rekvirent extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'class_id'
	];

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class, 'rekv_id');
	}

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'rekv_id');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'rekv_id');
	}
}
