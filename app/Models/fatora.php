<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fatora extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendor(){
        return $this->belongsTo(vendor::class);
    }
    public function customer(){
        return $this->belongsTo(customer::class);
    }

}
