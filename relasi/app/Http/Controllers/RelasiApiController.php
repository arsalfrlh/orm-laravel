<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Beli;
use App\Models\User;
use Illuminate\Http\Request;

class RelasiApiController extends Controller
{
    public function barang(){
        $data = Barang::withCount('beli')->get();
        return response()->json(['message' => "Berhasil menampilkan data barang dan jumlah beli", 'success' => true, 'data' => $data]);
    }

    public function user(){
        $data = User::withCount('beli')->get();
        return response()->json(['message' => "Berhasil menampilkan data User dan jumlah beli", 'success' => true, 'data' => $data]);
    }

    public function beli(){
        $data = Beli::with(['user','barang'])->get();
        return response()->json(['message' => "Berhasil menampilkan data pembelian, user, dan barang", 'success' => true, 'data' => $data]);
    }
}
