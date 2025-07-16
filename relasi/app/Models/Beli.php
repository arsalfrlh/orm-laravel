<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = "beli";
    protected $fillable = ['id_user','id_barang'];

    public function user(){
        return $this->belongsTo(User::class,'id_user'); //id_user forenky dari column tabel beli
    }

    public function barang(){
        return $this->belongsTo(Barang::class,'id_barang'); //id_barang forenky dari column tabel beli
    }

    // public function barang_beli(){
    //     return $this->hasMany(Barang::class,'id'); //id dari column tabel barang
    // }

    // public function user_beli(){
    //     return $this->hasMany(User::class,'id'); //id dari column tabel user
    // }
}
