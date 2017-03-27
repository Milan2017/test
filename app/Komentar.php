<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
	//
	protected $fillable = ['sadrzaj','clanak_id','autor_id'];
	protected $table="komentar";
	public $timestamps = false;
}
