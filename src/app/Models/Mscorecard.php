<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mscorecard extends Model
{
    use HasFactory;

    protected $table = "mscorecards";

    public function mscorecardaspect()
    {
        return $this->hasMany(MscorecardAspect::class);
    }
}
