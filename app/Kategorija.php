<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    //
	protected $fillable = ['naziv','autor_id'];
    protected $table="kategorija";
    public $timestamps = false;
}
