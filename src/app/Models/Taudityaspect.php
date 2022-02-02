<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taudity;
use App\Models\Maspek;

class Taudityaspect extends Model
{
    use HasFactory;
    protected $table = 'taudityaspect';

    public function Taudity()
    {
        return $this->belongsTo(Taudity::class);
    }

    public function Maspek()
    {
        return $this->belongsTo(Maspek::class);
    }
}
