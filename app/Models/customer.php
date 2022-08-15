<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'customers';

    public function buyfatoras(){
        return $this->hasMany(buyfatora::class);
    }
    public function fatoras(){
        return $this->hasMany(fatora::class);
    }
    public function get_total_buyfatoras()
    {
        return $this->buyfatoras()->sum('total');
    }
    public function ArrestReceipts(){
        return $this->hasMany(ArrestReceipts::class);
    }
}

