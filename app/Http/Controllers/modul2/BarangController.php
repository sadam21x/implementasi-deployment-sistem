<?php

namespace App\Http\Controllers\modul2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')->get();
        $barang2 = $barang;
        return view('modul2/barang', compact([
            'barang'
        ]));
    }

    public function cetak_barcode(Request $request)
    {
        // dd($request);

        $id_barang = $request->input_id_barang;
        $nama_barang = DB::table('barang')->where('id_barang', $id_barang)->value('nama');

        $paper_width = 107.716535433; // pt -> 38 mm
        $paper_height = 51.023622047; // pt -> 18 mm
        $paper_size = array(0, 0, $paper_width, $paper_height);

        $pdf = PDF::loadView('modul2/label-tnj-108', compact(
                    'id_barang',
                    'nama_barang'
                ));
        
        $pdf->setPaper($paper_size);

        return $pdf->stream();
    }
}