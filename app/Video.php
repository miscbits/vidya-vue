<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $fillable = [
		  'title'
		, 'subtitle'
		, 'description'
		, 'file_location'
	];
}
