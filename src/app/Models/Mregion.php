<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mregion extends Model
{
    use HasFactory;

    protected $table = "mregions";
    protected $fillable = ['regionname', 'id'];

}