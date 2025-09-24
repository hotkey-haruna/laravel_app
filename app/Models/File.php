<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $valid
 * @property int|null $create_user_id
 * @property Carbon|null $created
 * @property int|null $update_user_id
 * @property Carbon|null $updated
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';
	public $timestamps = false;

	protected $casts = [
		'valid' => 'int',
		'create_user_id' => 'int',
		'created' => 'datetime',
		'update_user_id' => 'int',
		'updated' => 'datetime'
	];

	protected $fillable = [
		'name',
		'path',
		'valid',
		'create_user_id',
		'created',
		'update_user_id',
		'updated'
	];
}

