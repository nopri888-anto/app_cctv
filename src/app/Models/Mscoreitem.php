<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mscoreitem extends Model
{
    use HasFactory;
    protected $table = "mscorecarditems";

    public function mscorecardaspect()
    {
        return $this->belongsTo('App\Models\MscorecardAspect', 'mscorecardaspectfk');
    }
}
