<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pasien;
use App\Models\Setting;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $kecamatan = Kecamatan::all()->whereIn('kabupaten_id',[3516,3576]);
        $pasien = Pasien::all()->count();
        $setting = Setting::find(1);
        return view('pasien', compact('kecamatan','pasien','setting'));
    }

    public function pasienPost(Request $request)
    {
        $rules = [
            'nik' => 'required|unique:pasien,nik',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'keluarga_besar_tni' => 'required',
        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong!',
            'unique' => ':attribute sudah terdaftar!',
        ];
    
        $this->validate($request, $rules, $customMessages);

        Pasien::create($request->all());
        return back()->with('success','Data berhasil disimpan');
    }

    public function kelurahan(Request $request)
    {
        $id = $request->id;
        $data = Kelurahan::all()->where('kecamatan_id',$id);
        return response()->json($data);
    }
}
