<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['nom','prenom'];

	public function participations() {
		return $this->hasMany(Participation::class,'participant_id','id');
    }
}
