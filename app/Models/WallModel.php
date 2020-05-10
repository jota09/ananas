<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WallModel extends Model
{
    protected $table = "wall";

    protected $fillable = [
        'id',
        'ptext',
        'pby',
        'pdate',
        'pidby'
    ];
}
