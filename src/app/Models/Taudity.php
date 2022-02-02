<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taudit;
use App\Models\Taudityaspect;

class Taudity extends Model
{
    use HasFactory;

    protected $table = 'taudity';

    public function Taudits()
    {
        return $this->belongsTo(Taudit::class);
    }

    public function Taudityaspect()
    {
        return $this->hasMany(Taudityaspect::class);
    }
}
