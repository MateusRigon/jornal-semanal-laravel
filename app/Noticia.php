<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model {
	public $timestamps = false;
	protected $fillable = [
		'titulo',
		'topico',
		'descricao',
		'link',
		'diaPostagem',
		'mesPostagem',
	];
}

?>