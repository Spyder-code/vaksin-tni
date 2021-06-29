<?php

namespace App\Http\Controllers;

use App\Exports\PasienExport;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Visitor;
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

    public function export() 
    {
        return Excel::download(new PasienExport, 'data-pasien.xlsx');
    }

    public function delete()
    {
        Pasien::truncate();
        return back()->with('success','Data berhasil terhapus');
    }

}
