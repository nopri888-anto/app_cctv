<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Maspek;

class MscorecardAspect extends Model
{
    use HasFactory;
    protected $table = "mscorecardaspect";

    public function mscorecards()
    {
        return $this->belongsTo('App\Models\Mscorecard', 'mscorecardfk');
    }

    public function Maspeks()
    {
        return $this->belongsTo(Maspek::class);
    }

    public function mscorecarditems()
    {
        return $this->hasMany(Mscoreitem::class);
    }
}
