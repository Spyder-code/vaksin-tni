<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KeluargaTNI;
use App\Models\Kelurahan;
use App\Models\Pasien;
use App\Models\Setting;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $pasien = Pasien::all()->count();
        $setting = Setting::find(1);
        $data = KeluargaTNI::all();
        return view('pasien', compact('pasien','setting','data'));
    }

    public function pasienPost(Request $request)
    {
        $rules = [
            'nik' => 'required|unique:pasien,nik',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
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
        $pasien = Pasien::all()->count();
        $setting = Setting::find(1);
        if ($pasien>=$setting->batas) {
            return back();
        } else {
            Pasien::create($request->all());
            return back()->with('success','Data berhasil disimpan');
        }
        
    }

    public function kelurahan(Request $request)
    {
        $id = $request->id;
        $data = Kelurahan::all()->where('kecamatan_id',$id);
        return response()->json($data);
    }
}
