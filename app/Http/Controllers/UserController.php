<?php

namespace App\Http\Controllers;
use App\Models\SuratKeteranganAktif;
use App\Models\SuratKeteranganAktifSetelahCuti;
use App\Models\SuratKeteranganCuti;
use App\Models\SuratKeteranganLulus;
use App\Models\SuratPengunduranDiri;
use App\Models\SuratPerpanjanganMasaStudi;
use App\Models\LegalisasiTranskrip;
use App\Models\BiodataUser;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('auth.user-login');
    }

    public function viewRegister()
    {
        return view('auth.user-register');
    }

    public function viewDashboard()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

        return view('user.dashboard',compact('daftarSurat'));
    }

    public function viewBiodata()
    {
        $user = Auth::user();
        $biodata_user = BiodataUser::where('users_id', $user->id)->first();
        // dd($user->id);
        // dd($biodata_user);
        return view('user.biodata', compact('biodata_user','user'));
    }

    public function viewBiodataEdit($id)
    {
        $user = Auth::user();
        $biodata_user = BiodataUser::where('users_id', $user->id)->first();
        return view('user.biodata-edit', compact('biodata_user','user'));
    }

    public function viewSuratKeteranganAktif()
    {
        return view('user.surat.surat-keterangan-aktif');
    }

    public function viewSuratKeteranganLulus()
    {
        return view('user.surat.surat-keterangan-lulus');
    }

    public function viewSuratPerpanjanganMasaStudi()
    {
        return view('user.surat.surat-perpanjangan-masa-studi');
    }

    public function viewSuratPengunduranDiri()
    {
        return view('user.surat.surat-pengunduran-diri');
    }

    public function viewSuratKeteranganCuti()
    {
        return view('user.surat.surat-keterangan-cuti');
    }

    public function viewSuratKeteranganAktifCuti()
    {
        return view('user.surat.surat-keterangan-aktif-cuti');
    }

    public function viewLegalisirTranskrip()
    {
        return view('user.surat.legalisir-transkrip');
    }  

    // detail view
    public function viewSuratKeteranganAktifDetail()
    {
        return view('user.surat.detail.surat-keterangan-aktif-detail');
    }

    public function viewSuratKeteranganLulusDetail()
    {
        return view('user.surat.detail.surat-keterangan-lulus-detail');
    }

    public function viewSuratPerpanjanganMasaStudiDetail()
    {
        return view('user.surat.detail.surat-perpanjangan-masa-studi-detail');
    }

    public function viewSuratPengunduranDiriDetail()
    {
        return view('user.surat.detail.surat-pengunduran-diri-detail');
    }

    public function viewSuratKeteranganCutiDetail()
    {
        return view('user.surat.detail.surat-keterangan-cuti-detail');
    }

    public function viewSuratKeteranganAktifCutiDetail()
    {
        return view('user.surat.detail.surat-keterangan-aktif-cuti-detail');
    }

    public function viewLegalisirTranskripDetail()
    {
        return view('user.surat.detail.legalisir-transkrip-detail');
    }  
}
