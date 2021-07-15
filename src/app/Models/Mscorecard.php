<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mscorecard extends Model
{
    use HasFactory;

    protected $table = "mscorecards";


    public function getDataAspek()
    {
        return DB::table('mscorecards')
            ->join('maspeks', 'mscorecards.maspectfk', '=', 'maspeks.id')
            ->select('mscorecards.*', 'maspeks.aspectname')
            ->get();
    }
}
