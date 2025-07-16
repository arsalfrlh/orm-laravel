<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Beli;
use App\Models\User;
use Illuminate\Http\Request;
// with()	Mengambil relasi (eager loading)
// withCount()	Hitung jumlah relasi
// withSum()	Total nilai kolom relasi
// withAvg()	Rata-rata nilai kolom relasi
// withMax()	Nilai maksimum kolom relasi
// withMin()	Nilai minimum kolom relasi
// load()	Sama seperti with(), tapi dipanggil setelah ambil data
// loadCount()	Sama seperti withCount(), tapi setelah ambil data
// has()	Filter data yang punya relasi
// whereHas()	Filter data relasi dengan kondisi
// doesntHave()	Data yang tidak punya relasi
// withDefault()	Nilai default untuk relasi yang kosong

class RelasiController extends Controller
{
    public function barang(){
        $barang = Barang::withCount('beli')->get();
        return view('main.barang', ['tampil' => $barang]);
    }

    public function user(){
        $user = User::withCount('beli')->get();
        return view('main.user', ['tampil' => $user]);
    }

    public function beli(){
        $beli = Beli::with(['user','barang'])->get();
        return view('main.beli',['tampil' => $beli]);
    }
}

//withCount
// $barang = Barang::withCount(['beli' => function($query){ //orm beli hasMany di model barang
//             $query->where('status','paid'); //mencari dan menghitung berdasarkan status yang sudah dibayar
//         }])->get();

//$beliBarang = Beli::with(['user','barang'])->withCount('beli_barang')->get(); //orm beli_barang hasMany di model beli
//$beliUser = Beli::with(['user','barang'])->withCount('beli_user')->get();

//withSum
//$barang = Barang::withSum('beli', 'jumlah')->get(); | $barang = Barang::withCount('beli')->withSum('beli','jumlah')->get(); //orm beli hasMany dari model barang| menjumlahkan semuanya
//<td>{{ $item->beli_sum_jumlah }}</td>