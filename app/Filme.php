<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Filme extends Model implements SluggableInterface
{
	 use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'titulo',
        'save_to'    => 'slug',
    ];


	protected $fillable = ['titulo', 'sinopse'];


    
    public function categorias()
    {
    	return $this->belongsToMany(Categoria::class);
    }




     public function tem_a_categoria($nome)
    {
        foreach ($this->categorias as $categoria) {
            if ($categoria->nome == $nome) {
                return true;
            }
        }

        return false;
    }
}
