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
    public function viewSuratKeteranganAktifDetail($id)
    {
        $daftarSKA             = SuratKeteranganAktif::where('id', $id)->first();
        if($daftarSKA){
            $user              = User::where('id',$daftarSKA->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKA->users_id)->first();
            return view('user.surat.detail.surat-keterangan-aktif-detail', compact('daftarSKA','user','biodata_user'));
        }
        abort(404);

        //return view('user.surat.detail.surat-keterangan-aktif-detail');
    }

    public function viewSuratKeteranganLulusDetail($id)
    {
        $daftarSKL           = SuratKeteranganLulus::where('id', $id)->first();
        if($daftarSKL){
            $user              = User::where('id',$daftarSKL->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKL->users_id)->first();
            return view('user.surat.detail.surat-keterangan-lulus-detail', compact('daftarSKL','user','biodata_user'));
        }
        abort(404);

        //return view('user.surat.detail.surat-keterangan-lulus-detail');
    }

    public function viewSuratPerpanjanganMasaStudiDetail($id)
    {
        $daftarSPMS           = SuratPerpanjanganMasaStudi::where('id', $id)->first();
        if($daftarSPMS){
            $user              = User::where('id',$daftarSPMS->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSPMS->users_id)->first();
            return view('user.surat.detail.surat-perpanjangan-masa-studi-detail', compact('daftarSPMS','user','biodata_user'));
        }

        //return view('user.surat.detail.surat-perpanjangan-masa-studi-detail');
    }

    public function viewSuratPengunduranDiriDetail($id)
    {
        $daftarSPD           = SuratPengunduranDiri::where('id', $id)->first();
        if($daftarSPD){
            $user              = User::where('id',$daftarSPD->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSPD->users_id)->first();
            return view('user.surat.detail.surat-pengunduran-diri-detail', compact('daftarSPD','user','biodata_user'));
        }

        //return view('user.surat.detail.surat-pengunduran-diri-detail');
    }

    public function viewSuratKeteranganCutiDetail($id)
    {
        $daftarSKC             = SuratKeteranganCuti::where('id', $id)->first();
        if($daftarSKC){
            $user              = User::where('id',$daftarSKC->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKC->users_id)->first();
            return view('user.surat.detail.surat-keterangan-cuti-detail', compact('daftarSKC','user','biodata_user'));
        }
        abort(404);

        //return view('user.surat.detail.surat-keterangan-cuti-detail');
    }

    public function viewSuratKeteranganAktifCutiDetail($id)
    {
        $daftarSKASC           = SuratKeteranganAktifSetelahCuti::where('id', $id)->first();
        if($daftarSKASC){
            $user              = User::where('id',$daftarSKASC->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKASC->users_id)->first();
            return view('user.surat.detail.surat-keterangan-aktif-cuti-detail', compact('daftarSKASC','user','biodata_user'));
        }
        abort(404);

        //return view('user.surat.detail.surat-keterangan-aktif-cuti-detail');
    }

    public function viewLegalisirTranskripDetail($id)
    {
        $daftarSL              = LegalisasiTranskrip::where('id', $id)->first();
        if($daftarSL){
            $user              = User::where('id',$daftarSL->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSL->users_id)->first();
            return view('user.surat.detail.legalisir-transkrip-detail', compact('daftarSL','user','biodata_user'));
        }
        abort(404);

        //return view('user.surat.detail.legalisir-transkrip-detail');
    }  
}
