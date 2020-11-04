<?php

namespace App\Http\Controllers\modul3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;

class KunjunganTokoController extends Controller
{
    public function index()
    {
        $toko = DB::table('lokasi_toko')->get();
        return view('modul3/kunjungan-toko', compact('toko'));
    }

    public function tambah_toko(Request $request)
    {

        $jumlah_toko = DB::table('lokasi_toko')->count();
        $jumlah_toko = $jumlah_toko + 1;

        if( 0 <= $jumlah_toko && $jumlah_toko <= 9 ){
            $id_toko = "STR0000" . $jumlah_toko;
        } elseif ( 10 <= $jumlah_toko && $jumlah_toko <= 99 ) {
            $id_toko = "STR000" . $jumlah_toko;
        } elseif ( 100 <= $jumlah_toko && $jumlah_toko <= 999 ) {
            $id_toko = "STR00" . $jumlah_toko;
        } elseif ( 1000 <= $jumlah_toko && $jumlah_toko <= 9999 ) {
            $id_toko = "STR0" . $jumlah_toko;
        } elseif ( 10000 <= $jumlah_toko && $jumlah_toko <= 99999 ) {
            $id_toko = "STR" . $jumlah_toko;
        }

        DB::table('lokasi_toko')->insert([
            'barcode' => $id_toko,
            'nama_toko' => $request->input_nama_toko,
            'latitude' => $request->input_latitude,
            'longitude' => $request->input_longitude,
            'accuracy' => $request->input_accuracy
        ]);

        return redirect('/kunjungan-toko');
    }

    public function req_data_toko()
    {
        $id_toko =  $_POST['id'];

        $toko = DB::table('lokasi_toko')->get();

        return response()->json($toko);
    }

    public function cetak_barcode(Request $request)
    {
        $id_toko = $request->id_toko;
        $nama_toko = DB::table('lokasi_toko')->where('barcode', $id_toko)->value('nama_toko');

        $pdf = PDF::loadView('modul3/barcode-toko', compact(
            'id_toko',
            'nama_toko'
        ));

        return $pdf->stream();
    }
}