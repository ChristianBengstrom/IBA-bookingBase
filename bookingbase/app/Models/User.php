<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property boolean $password
 * @property string $remembertoken
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $rekv_id
 * 
 * @property \App\Models\Rekvirent $rekvirent
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'password' => 'boolean',
		'rekv_id' => 'int'
	];

	protected $hidden = [
		'password',
		'remembertoken'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remembertoken',
		'rekv_id'
	];

	public function rekvirent()
	{
		return $this->belongsTo(\App\Models\Rekvirent::class, 'rekv_id');
	}

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'bookers_u_id');
	}
}
