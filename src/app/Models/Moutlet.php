<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Moutlet extends Model
{
    use HasFactory;

    protected $table = "moutlets";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'mbranchfk', 'outlatename'];

    public function branchs()
    {
        return $this->belongsTo(Mbranch::class);

        //return $this->belongsTo('App\Models\Category','mcategories_id');
    }

    public function getDataBranch()
    {
        return DB::table('moutlets')
            ->join('mbranches', 'moutlets.mbranchfk', '=', 'mbranches.id')
            ->select('moutlets.*', 'mbranches.branchname')
            ->get();
    }
}