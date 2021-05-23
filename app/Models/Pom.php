<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Pom extends Model
{
	use HasFactory;

	protected $fillable = [
		'name', 'color', 'height', 'teeth', 'birthday', 'age', 'titles',
		'has_fontanel', 'is_for_sale', 'is_open_for_breeding', 'is_male'
	];

	// Images
	public function images()
	{
		return $this->morphMany(Image::class, 'imageable');
	}

	public function avatarImage()
	{
		$chosen_avatar = $this->images->where('is_main', 1)->first();

		return $chosen_avatar ? $chosen_avatar->url : $this->images->first()->url;
	}

	// Breeders, owners
	public function people()
	{
		return $this->belongsToMany(Person::class);
	}

	// Family relations
	public function children()
	{
		return $this->belongsToMany(Pom::class, 'child_parent', 'parent_id', 'child_id');
	}

	public function parents()
	{
		return $this->belongsToMany(Pom::class, 'child_parent', 'child_id', 'parent_id');
	}
}
