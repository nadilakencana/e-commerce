<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Orders extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function order (){
        return $this->belongsTo(Orders::class, 'id', 'id_order');
    }

    public function product (){
        return $this->belongsTo(Products::class, 'id', 'id_product');
    }

    public function ukuran(){
        return $this->belongsTo(Variasi_Ukurans::class, 'id', 'id_ukuran');
    }

    public function warna (){
        return $this->belongsTo(Variasi_Warnas::class, 'id', 'id_warna');
    }
}
