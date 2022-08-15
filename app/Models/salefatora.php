<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salefatora extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vendor(){
        return $this->belongsTo(vendor::class);
    }
    public function get_total_buyfatoras()
    {
        return $this->buyfatoras()->sum('total');
    }
}

