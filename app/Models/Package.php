<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    function Packagetype()
    {
        return $this->belongsTo(Packagetype::class,'package_type_id');
    }
}
