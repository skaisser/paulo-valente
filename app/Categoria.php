<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	public function filmes()
	{
		return $this->belongsToMany(Filme::class);
	}

}
