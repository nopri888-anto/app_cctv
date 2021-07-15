<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mbranch extends Model
{
    use HasFactory;
    protected $table = "mbranches";
    protected $fillable = ['mregionfk', 'branchname', 'id'];

    public function mregions()
    {
        //return DB::table('mbranches')
        //  ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
        //->select('mbranches.*', 'mregions.*')
        //->get();
        return $this->belongsTo(Mregion::class);
        // return $this->belongsTo('App\Models\Mregion', 'mregionfk');
    }

    public function moutlets()
    {
        return $this->hasMany(Moutlet::class);
    }

    public function getDataRegion()
    {
        return DB::table('mbranches')
            ->join('mregions', 'mbranches.mregionfk', '=', 'mregions.id')
            ->select('mbranches.*', 'mregions.regionname')
            ->get();
    }
}