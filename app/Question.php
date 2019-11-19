<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded =[];

	public function reponses() {
		return $this->hasMany(Reponse::class,'question_id','id');
    }
}
