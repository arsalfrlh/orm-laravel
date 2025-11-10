<?php

namespace App\Http\Controllers;

use App\Models\Beli;
use App\Models\Hotel;
use Illuminate\Http\Request;

// orm itu bisa menggunakan titik (.)
// with()	with('barang.gambar')
// whereHas()	whereHas('barang.gambar')
// has()	has('barang.gambar')
// orWhereHas()	orWhereHas('barang.gambar')
// withSum()	withSum('barang.payment', 'total')
// withAvg()	withAvg('barang.review', 'rating')
// withMax()	withMax('barang.stock', 'jumlah')
// withMin()	withMin('barang.stock', 'jumlah')
// orderBy() relasi	orderBy('barang.harga')

class BeliApiController extends Controller
{
    public function beli(){
        //di model beli punya orm user dan barang dan memanggilnya| di model barang punya orm gambar dan kita panggil dgn (.)
        $data = Beli::with(['user','barang.gambar',
        //kita ingin menhitung jumlah pembelian yg berhasil maka kita masuk ke model barang dgn cara function($query)| $query sekarang adalah model barang yg di dlm model beli
        'barang' => function($query){
            //di model barang ($query) punya orm beli dan kita hitung berapa banyak barang yg dibeli| tapi di model beli ingin yg status berhasil
            $query->withCount(['beli' => function($query){ //model barang ($query) masuk ke model beli dgn cara function($query)| $query sekarang adalah model beli yg di count di dlm model barang yg di dalam model beli
                $query->where('status','berhasil'); //di column model beli ada status dan dihitung hanya yg statusnya berhasil
            }]);
        }])->get();
        return response()->json(['message' => "Menampilkan data Beli", 'success' => true, 'data' => $data]);
    }

    public function hotel(){
        //with tidak bisa menguba array keynya dgn as| jika ingin menambahkan buat orm fasilitas baru di model hotel
        $data = Hotel::with(['fasilitas' => function($query){
            $query->where('status', 'aktif');
            //mengubah nama dari fasilitas_count menjadi fasilitas_aktif
        },])->withCount(['fasilitas as fasilitas_aktif' => function($query){
            $query->where('status','aktif');
        }, 'fasilitas as fasilitas_nonaktif' => function($query){
            $query->where('status','nonaktif');
        }])->get();
        return response()->json(['message' => "Menampilkan data Hotel", 'success' => true, 'data' => $data]);
    }

    public function search(Request $request){
        $search = $request->get('search');
        if(strlen($search)){
            $data = Hotel::with('fasilitas')->where('nama_hotel','like',"%$search%")->orWhereHas('fasilitas', function($query) use ($search){
                $query->where('nama_fasilitas','like',"%$search%");
            })->get();
        }else{
            $data = [];
        }
        return response()->json(['message' => "Menampilkan hasil pencarian", 'success' => true, 'data' => $data]);
    }
}
