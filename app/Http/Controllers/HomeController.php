<?php

namespace App\Http\Controllers;

use App\Exports\PasienExport;
use App\Models\KeluargaTNI;
use App\Models\Pasien;
use App\Models\Setting;
use App\Models\User;
use App\Models\Visitor;
use Database\Seeders\KeluargaTNISeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $visitor = Visitor::all();
        $user = User::all();
        return view('admin.main',compact('visitor','user'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function pasien()
    {
        $data = Pasien::all();
        return view('admin.pasien', compact('data'));
    }

    public function setting()
    {
        $setting = Setting::find(1);
        $data = KeluargaTNI::all();
        return view('admin.setting',compact('setting','data'));
    }

    public function updateSetting(Request $request)
    {
        $request->validate([
            'batas' => 'required',
            'pesan' => 'required',
            'buka' => 'required',
            'pukul' => 'required',
        ]);

        Setting::find(1)->update($request->all());
        return back()->with('success','Data berhasil disimpan');
    }

    public function export() 
    {
        return Excel::download(new PasienExport, 'data-pasien.xlsx');
    }

    public function delete()
    {
        Pasien::truncate();
        return back()->with('success','Data berhasil terhapus');
    }

    public function addKeluarga(Request $request)
    {
        $request->validate(['nama'=>'required']);
        KeluargaTNI::create($request->all());
        return back()->with('success','Data berhasil ditambahkan');
    }

    public function deleteKeluarga($id)
    {
        KeluargaTNI::destroy($id);
        return back()->with('success','Data berhasil terhapus');
    }

}
