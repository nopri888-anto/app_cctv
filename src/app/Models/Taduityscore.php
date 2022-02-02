<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taudityaspect;

class Taduityscore extends Model
{
    use HasFactory;

    protected $table = 'taudityscore';

    public function Taudityaspect()
    {
        return $this->belongsTo(Taudityaspect::class);
    }
}
