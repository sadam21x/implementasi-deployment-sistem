<?php

namespace App\Http\Controllers\modul5;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view('modul5.upload');
    }

    public function store(Request $request)
    {
        $file_excel = $request->file('file_excel');
        $current_customers = DB::table('customer')->get('id_customer')->toArray();
        $excel = Excel::toArray(new CustomersImport(), $file_excel);
        $data = [];
        $error_data = [];

        foreach ($excel[0] as $key => $value) {
            $data = $excel[0];
        }

        array_shift($data);

        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($current_customers); $j++) {
                if ($data[$i][0] == $current_customers[$j]->id_customer) {
                    array_push($error_data, $data[$i]);
                    array_splice($data, $i, $i+1);
                }
            }
        }

        // dd($error_data);

        for ($i = 0; $i < count($data); $i++) {
            $id_kelurahan = DB::table('kelurahan')->where('kodepos', $data[$i][3])->value('id_kelurahan');

            if ($id_kelurahan == null){
                $kodepos_dummy = '81153'; 
                $id_kelurahan = DB::table('kelurahan')->where('kodepos', $kodepos_dummy)->value('id_kelurahan');
            }

            DB::table('customer')->insert([
                'id_customer' => $data[$i][0],
                'nama' => $data[$i][1],
                'alamat' => $data[$i][2],
                'id_kelurahan' => $id_kelurahan
            ]);
        }

        if ( empty($error_data) ){
            $status_code = 0;
            return redirect('/customer')->with(compact('status_code'))->with(compact('error_data'));
        } else {
            $status_code = 1;
            return redirect('/customer')->with(compact('status_code'));
        }

    }
}
