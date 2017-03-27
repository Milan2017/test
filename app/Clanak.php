<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clanak extends Model
{
	//
	protected $fillable = ['naslov','tekst','kategorija_id','autor_id'];
	protected $table="clanak";
	public $timestamps = false;
}
