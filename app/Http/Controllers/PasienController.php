<?php

namespace App\Http\Controllers;

use App\Models\KeluargaTNI;
use App\Models\Kelurahan;
use App\Models\Pasien;
use App\Models\Setting;
use Illuminate\Http\Request;
use \Milon\Barcode\DNS2D;

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
            'nik' => 'required|unique:pasien,nik|min:16',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'vaksin_ke' => 'required',
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
            $pas = Pasien::latest('id')->first();
            if ($pas==null) {
                $id=1;
            }else{
                $id = $pas->id +1;
            }
            if ($id>0 && $id<=9) {
                $no = '000'.$id;
            } else if($id>=10 && $id<=99){
                $no = '00'.$id;
            } else if($id>=100 && $id<=999){
                $no = '0'.$id;
            }else{
                $no = $id;
            };
            
            $kode = 'D'.date('d').''.date('m').''.$no;

            $data = new Pasien;
            $data->no = $no;
            $data->kode = $kode;
            $data->nik = $request->nik;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->no_hp = $request->no_hp;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->nama = $request->nama;
            $data->vaksin_ke = $request->vaksin_ke;
            $data->alamat = $request->alamat;
            $data->kelurahan = $request->kelurahan;
            $data->kecamatan = $request->kecamatan;
            $data->keluarga_besar_tni = $request->keluarga_besar_tni;
            $data->save();

            return redirect()->route('data',['pasien'=>$data->id]);
        }
        
    }

    public function kelurahan(Request $request)
    {
        $id = $request->id;
        $data = Kelurahan::all()->where('kecamatan_id',$id);
        return response()->json($data);
    }

    public function data(Pasien $pasien)
    {
        return view('data',compact('pasien'));
    }

    public function download(Pasien $pasien)
    {
        $d = new DNS2D();
        $data = $d->getBarcodePNG($pasien->kode, 'QRCODE');
        // dd($data);
        $html = 
        '
            <div class="header">
                <h1>NO DAFTAR ONLINE</h1>
                <h1>RUMKITBAN/RS DKT MOJOKERTO</h1>
            </div>
            <hr>
            <div class="flex">
                <div>
                    <table>
                        <tr>
                            <td class="td">Nomor</td>
                            <td>:</td>
                            <td>'.$pasien->kode.'</td>
                        </tr>
                        <tr>
                            <td class="td">Nama</td>
                            <td>:</td>
                            <td>'.$pasien->nama.'</td>
                        </tr>
                        <tr>
                            <td class="td">NIK</td>
                            <td>:</td>
                            <td>'.$pasien->nik.'</td>
                        </tr>
                        <tr>
                            <td class="td">Vaksin ke</td>
                            <td>:</td>
                            <td>'.$pasien->vaksin_ke.'</td>
                        </tr>
                    </table>
                </div>
                <div class="qr"> 
                    <img class="img" src="data:image/png;base64,' .$data . '" alt="barcode"   />
                </div>
            </div>
        ';
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents(public_path('pdf.css')); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $mpdf->Output('vaksinID.pdf', 'D');
    }
}
