<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MscorecardAspect;
use App\Models\Taudityaspect;
use Illuminate\Support\Facades\DB;

class Maspek extends Model
{
    use HasFactory;

    protected $table = "maspeks";

    public function Mscorecardaspects()
    {
        return $this->hasMany(MscorecardAspect::class);
    }

    public function Taudityaspects()
    {
        return $this->hasMany(Taudityaspect::class);
    }

    public function getDataScorecardAspect()
    {
        return DB::table('maspeks')
            ->join("mscorecardaspect", "maspeks.id", "=", "mscorecardaspect.maspectfk")
            ->join("mscorecards", "mscorecards.id", "=", "mscorecardaspect.mscorecardfk")
            ->select('mscorecards.*', 'maspeks.*')
            ->get();
    }
}
