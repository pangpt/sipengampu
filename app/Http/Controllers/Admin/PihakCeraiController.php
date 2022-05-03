<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Putusan;
use App\Exports\PutusanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class PihakCeraiController extends Controller
{
    //
    public function index()
    {
        // $data = Putusan::get();
        // $data = DB::connection('mysql2')->select(DB::raw("SELECT * FROM perkara_putusan"));
        $data = DB::connection('mysql2')->table('perkara_putusan')->select('perkara.perkara_id','perkara_putusan.amar_putusan','perkara_putusan.tanggal_putusan','perkara.nomor_perkara','perkara.pihak1_text','perkara.pihak2_text','perkara_akta_cerai.tgl_akta_cerai','perkara_akta_cerai.nomor_akta_cerai')->leftjoin('perkara','perkara.perkara_id','=','perkara_putusan.perkara_id')->leftjoin('perkara_akta_cerai','perkara_akta_cerai.perkara_id','=','perkara.perkara_id')->where('nomor_akta_cerai', '!=', 'null')->where( 'tanggal_putusan','>=','2021-01-01')->get();
        
        // $cc = collect($data);
        // dd($data[1]);

        return view('admin.pihak_cerai.index',[
            'data' => $data,
        ]);
    }

    public function detail($id)
    {
        // $data = Putusan::get();
        $data = DB::connection('mysql2')->table('perkara_putusan')->select('perkara.perkara_id','perkara_putusan.amar_putusan','perkara_putusan.tanggal_putusan','perkara.nomor_perkara','perkara.pihak1_text','perkara.pihak2_text','perkara_akta_cerai.tgl_akta_cerai','perkara_akta_cerai.nomor_akta_cerai')->leftjoin('perkara','perkara.perkara_id','=','perkara_putusan.perkara_id')->leftjoin('perkara_akta_cerai','perkara_akta_cerai.perkara_id','=','perkara.perkara_id')->where('perkara_putusan.perkara_id',$id)->first();
        
        // dd($data);
        
        return view('admin.pihak_cerai.detail',[
            'data' => $data,
        ]);

    }

    public function edit(Request $request, $id)
    {
        // $akta = Putusan::where()
        // $detail = Putusan::where('id', $id)->first();
        // $file_path = $detail->file_putusan;

        // if($request->file('file_putusan')) {
        //     $file_path = $request->file('file_putusan')->store('public/putusan');
        // }

        // $data = Putusan::where('id', $id)->first();
        // $data->file_putusan = $file_path;
        // $data->update();

        // dd($data);

        return redirect()->route('pihak_cerai')->with(['success' => 'Berhasil menambahkan dokumen putusan.']);
    }

    public function hapus($id)
    {
        $key = Putusan::findOrFail($id);
        $key->delete();

        return redirect()->route('pihak_cerai')->with(['success' => 'Berhasil menghapus data putusan.']);
    }

    public function exportPutusan()
    {
        // $data = Putusan::all();
        return Excel::download(new PutusanExport,'Daftar_Pihak_Berputus.xlsx');
    }
}
