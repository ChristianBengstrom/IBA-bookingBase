<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Feb 2019 10:04:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property string $id
 * @property int $size
 * @property \Carbon\Carbon $created_when
 * @property \Carbon\Carbon $updated_at
 * @property int $rekv_id
 * 
 * @property \App\Models\Rekvirent $rekvirent
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	protected $table = 'course';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'size' => 'int',
		'rekv_id' => 'int'
	];

	protected $dates = [
		'created_when'
	];

	protected $fillable = [
		'size',
		'created_when',
		'rekv_id'
	];

	public function rekvirent()
	{
		return $this->belongsTo(\App\Models\Rekvirent::class, 'rekv_id');
	}
}
