<?php

namespace App\Http\Controllers;

use App\Models\TokoBaju;
use Illuminate\Http\Request;

class TokoBajuController extends Controller
{
    /**
     * Menampilkan data seluruh baju.
     * HTTP GET
     */
    public function index()
    {
        return TokoBaju::all();
    }

    /**
     * Menambahkan baju baru.
     * HTTP POST
     */
    public function create(Request $request)
    {
        $baju = new TokoBaju();

        $baju->nama_baju = $request->nama_baju;
        $baju->nama_brand = $request->nama_brand;
        $baju->stok = $request->stok;
        $baju->harga = $request->harga;
        $baju->save();

        return "Berhasil menambahkan baju";
    }

    /**
     * Mengupdate data baju.
     * HTTP PUT
     */
    public function update(Request $request, $id)
    {
        $nama_baju = $request->nama_baju;
        $nama_brand = $request->nama_brand;
        $stok = $request->stok;
        $harga = $request->harga;

        $baju = TokoBaju::find($id);
        $baju->nama_baju = $nama_baju;
        $baju->nama_brand = $nama_brand;
        $baju->stok = $stok;
        $baju->harga = $harga;
        $baju->save();

        return "Berhasil mengupdate baju";
    }

    /**
     * Menghapus data baju.
     * HTTP DELETE
     */
    public function delete($id)
    {
        $baju = TokoBaju::find($id);
        $baju->delete();

        return "Berhasil menghapus baju";
    }
}
