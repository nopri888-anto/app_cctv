<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mcam extends Model
{
    use HasFactory;

    protected $table = "mcams";

    public function cam()
    {
        return $this->belongsTo(Moutlet::class);
    }

    public function getDataOutlet()
    {
        return DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->select('mcams.*', 'moutlets.outlatename')
            ->get();
    }

    public function getDataCam()
    {
        return DB::table('mcams')
            ->join('moutlets', 'mcams.moutletfk', '=', 'moutlets.id')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mcams.*', 'moutlets.*', 'mbranches.*', 'mregions.*')
            ->get();
    }

}