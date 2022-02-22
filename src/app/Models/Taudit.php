<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Taudity;

class Taudit extends Model
{
    use HasFactory;

    protected $table = 'taudits';

    public function taudity()
    {
        return $this->hasMany(Taudity::class);
    }
}
