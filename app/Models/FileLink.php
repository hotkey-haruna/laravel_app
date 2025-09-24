<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FileLink
 * 
 * @property int $id
 * @property int $project_id
 * @property int $user_id
 * @property int $valid
 * @property int|null $create_user_id
 * @property Carbon|null $created
 * @property int|null $update_user_id
 * @property Carbon|null $updated
 *
 * @package App\Models
 */
class FileLink extends Model
{
	protected $table = 'file_links';
	public $timestamps = false;

	protected $casts = [
		'project_id' => 'int',
		'user_id' => 'int',
		'token' => 'string',
		'valid' => 'int',
		'create_user_id' => 'int',
		'created' => 'datetime',
		'update_user_id' => 'int',
		'updated' => 'datetime'
	];

	protected $fillable = [
		'project_id',
		'user_id',
		'token',
		'valid',
		'create_user_id',
		'created',
		'update_user_id',
		'updated'
	];
}

