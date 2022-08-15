<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function salefatoras(){
        return $this->hasMany(salefatora::class);
    }
    public function fatoras(){
        return $this->hasMany(fatora::class);
    }
    public function get_total_salefatora()
    {
        return $this->salefatoras()->sum('total');
    }
    public function get_total_fatoras()
    {
        return $this->fatoras()->sum('total');
    }

    public function paymentreceipt(){
        return $this->hasMany(Paymentreceipt::class);
    }
}
