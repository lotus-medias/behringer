<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = ['participant_id','reponse_id','est_juste'];
}
