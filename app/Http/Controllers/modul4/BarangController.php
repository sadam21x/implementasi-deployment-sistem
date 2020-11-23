<?php

namespace App\Http\Controllers\modul4;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    // read semua data
    public function index()
    {
        $barang = DB::table('barang')->get();
        return response()->json($barang, 200);
    }

    // read data barang tertentu
    public function show($id)
    {
        $validate = DB::table('barang')->where('id_barang', $id)->exists();

        if ( $validate ){
            $barang = DB::table('barang')->where('id_barang', $id)->get();
            return response()->json($barang, 200);

        } else {
            $message = 'Maaf, data barang tidak ditemukan.';
            return response()->json($message, 400);
        }
    }

    // Insert data
    public function insert_barang(Request $request)
    {

        $validate = $request->has('nama');

        if ( $validate ){
            $jumlah_barang = DB::table('barang')->count();  
            $id_barang = 'BRG000' . $jumlah_barang;

            DB::table('barang')->insert([
                'id_barang' => $id_barang,
                'nama' => $request->nama
            ]);

            $message = "Data barang berhasil ditambahkan.";

            return response()->json($message, 201);

        } else {
            $message = "Maaf, anda belum memasukkan nama barang.";
            return response()->json($message, 400);
        }

    }

    // update barang
    public function update_barang(Request $request)
    {

        $validate_1 = $request->has('id');
        $validate_2 = $request->has('nama');
        $validate_3 = DB::table('barang')->where('id_barang', $request->id)->exists();

        if ( $validate_1 && $validate_2 && $validate_3 ){
            $old_name = DB::table('barang')->where('id_barang', $request->id)->value('nama');
            $new_name = $request->nama;

            DB::table('barang')->where('id_barang', $request->id)->update([
                'nama' => $request->nama
            ]);

            $message = 'Data barang berhasil diupdate (' . $old_name . ' => ' . $new_name . ')';

            return response()->json($message, 202);

        } else {
            $message = 'Maaf, anda belum melengkapi id atau nama barang atau id barang yang anda masukkan salah.';
            return response()->json($message, 400);
        }

    }

    // Delete barang
    public function delete_barang(Request $request)
    {

        $validate_1 = $request->has('id');

        if ( $validate_1 ) {

            $id_barang = $request->id;
            $validate_2 = DB::table('barang')->where('id_barang', $id_barang)->exists();

            if ( $validate_2 ) {
                DB::table('barang')->where('id_barang', $id_barang)->delete();
                $message = 'Data barang berhasil dihapus';
                return response()->json($message, 200);

            } else {
                $message = 'Maaf, data barang tidak ditemukan';
                return response()->json($message, 400);
            }

        } else {
            $message = 'Maaf, anda belum memasukkan parameter id';
            return response()->json($message, 400);
        }

    }
}
