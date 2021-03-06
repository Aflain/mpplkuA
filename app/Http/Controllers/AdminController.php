<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SuratKeteranganAktifController;
use App\Models\SuratKeteranganAktif;
use App\Models\SuratKeteranganAktifSetelahCuti;
use App\Models\SuratKeteranganCuti;
use App\Models\SuratKeteranganLulus;
use App\Models\SuratPengunduranDiri;
use App\Models\SuratPerpanjanganMasaStudi;
use App\Models\LegalisasiTranskrip;
use App\Models\User;
use App\Models\Admin;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdminDashboard()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

        $pending = $daftarSurat->where('status_surat','=','Pending')->count();
        $diproses = $daftarSurat->where('status_surat','=','Diproses')->count();
        $selesai = $daftarSurat->where('status_surat','=','Selesai')->count();

        return view('admin.dashboard',compact('daftarSurat','pending','diproses','selesai'));
    }

    public function viewSuratDiproses()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

                        //->where('status_surat','=',"Diproses")->get();

        return view('admin.surat-diproses', compact('daftarSurat'));
    }

    public function viewSuratMasuk()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

        // $daftarSKA = SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at');

        // $daftarSKAC = SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at');

        return view('admin.surat-masuk', compact('daftarSurat'));
    }
    
    public function viewSuratSelesai()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

        return view('admin.surat-selesai', compact('daftarSurat'));

        //return view('admin.surat-selesai');
    }
    
    public function viewSuratDitolak()
    {
        $daftarSurat = LegalisasiTranskrip::select('id','nama_surat','status_surat','created_at')
                        ->unionAll(SuratKeteranganAktif::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganAktifSetelahCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganCuti::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratKeteranganLulus::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPengunduranDiri::select('id','nama_surat','status_surat','created_at'))
                        ->unionAll(SuratPerpanjanganMasaStudi::select('id','nama_surat','status_surat','created_at'))
                        ->get();

        return view('admin.surat-ditolak', compact('daftarSurat'));
    }
    
    public function viewCreateAdmin()
    {
        return view('admin.create-admin');
    }
    
    public function ___construct(){
        $this->middleware('auth:admin');
      }
    
    public function viewLogin()
    {
        return view('admin.login');
    }

    public function viewSuratKeteranganAktif($id)
    {
        $daftarSKA             = SuratKeteranganAktif::where('id', $id)->first();
        if($daftarSKA){
            $user              = User::where('id',$daftarSKA->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKA->users_id)->first();
            if($daftarSKA->status_surat == 'Pending'){
                return view('admin.detail.surat-keterangan-aktif-detail', compact('daftarSKA','user','biodata_user'));
            }
            if($daftarSKA->status_surat == 'Diproses' || $daftarSKA->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_keterangan_aktif', compact('daftarSKA','user','biodata_user'));
            }
            if($daftarSKA->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_keterangan_aktif', compact('daftarSKA','user','biodata_user'));
            }
        }
        abort(404);
    }

    public function viewLegalisir($id)
    {
        $daftarSL              = LegalisasiTranskrip::where('id', $id)->first();
        if($daftarSL){
            $user              = User::where('id',$daftarSL->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSL->users_id)->first();
            if($daftarSL->status_surat == 'Pending'){
                return view('admin.detail.legalisir-transkrip-detail', compact('daftarSL','user','biodata_user'));
            }
            if($daftarSL->status_surat == 'Diproses' || $daftarSL->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_legalisir', compact('daftarSL','user','biodata_user'));
            }
            if($daftarSL->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_legalisir', compact('daftarSL','user','biodata_user'));
            }
        }
        abort(404);
    }

    public function viewSuratKeteranganCuti($id)
    {
        $daftarSKC             = SuratKeteranganCuti::where('id', $id)->first();
        if($daftarSKC){
            $user              = User::where('id',$daftarSKC->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKC->users_id)->first();
            if($daftarSKC->status_surat == 'Pending'){
                return view('admin.detail.surat-keterangan-cuti-detail', compact('daftarSKC','user','biodata_user'));
            }
            if($daftarSKC->status_surat == 'Diproses' || $daftarSKC->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_keterangan_cuti', compact('daftarSKC','user','biodata_user'));
            }
            if($daftarSKC->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_keterangan_cuti', compact('daftarSKC','user','biodata_user'));
            }
        }
        abort(404);
    }

    public function viewSuratKeteranganAktifSetelahCuti($id)
    {
        $daftarSKASC           = SuratKeteranganAktifSetelahCuti::where('id', $id)->first();
        if($daftarSKASC){
            $user              = User::where('id',$daftarSKASC->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKASC->users_id)->first();
            if($daftarSKASC->status_surat == 'Pending'){
                return view('admin.detail.surat-keterangan-aktif-setelah-cuti-detail', compact('daftarSKASC','user','biodata_user'));
            }
            if($daftarSKASC->status_surat == 'Diproses' || $daftarSKASC->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_keterangan_aktif_setelah_cuti', compact('daftarSKASC','user','biodata_user'));
            }
            if($daftarSKASC->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_keterangan_aktif_setelah_cuti', compact('daftarSKASC','user','biodata_user'));
            }
        }
        abort(404);
    }

    public function viewSuratKeteranganLulus($id)
    {
        $daftarSKL           = SuratKeteranganLulus::where('id', $id)->first();
        if($daftarSKL){
            $user              = User::where('id',$daftarSKL->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSKL->users_id)->first();
            if($daftarSKL->status_surat == 'Pending'){
                return view('admin.detail.surat-keterangan-lulus-detail', compact('daftarSKL','user','biodata_user'));
            }
            if($daftarSKL->status_surat == 'Diproses' || $daftarSKL->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_keterangan_lulus', compact('daftarSKL','user','biodata_user'));
            }
            if($daftarSKL->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_keterangan_lulus', compact('daftarSKL','user','biodata_user'));
            }
        }
        abort(404);
    }

    public function viewSuratPengunduranDiri($id)
    {
        $daftarSPD           = SuratPengunduranDiri::where('id', $id)->first();
        if($daftarSPD){
            $user              = User::where('id',$daftarSPD->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSPD->users_id)->first();
            if($daftarSPD->status_surat == 'Pending'){
                return view('admin.detail.surat-pengunduran-diri-detail', compact('daftarSPD','user','biodata_user'));
            }
            if($daftarSPD->status_surat == 'Diproses' || $daftarSPD->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_pengunduran_diri', compact('daftarSPD','user','biodata_user'));
            }
            if($daftarSPD->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_pengunduran_diri', compact('daftarSPD','user','biodata_user'));
            }
        }
    }

    public function viewSuratPerpanjanganMasa($id)
    {
        $daftarSPMS           = SuratPerpanjanganMasaStudi::where('id', $id)->first();
        if($daftarSPMS){
            $user              = User::where('id',$daftarSPMS->users_id)->first();
            $biodata_user      = BiodataUser::where('users_id',$daftarSPMS->users_id)->first();
            if($daftarSPMS->status_surat == 'Pending'){
                return view('admin.detail.surat-perpanjangan-masa-studi-detail', compact('daftarSPMS','user','biodata_user'));
            }
            if($daftarSPMS->status_surat == 'Diproses' || $daftarSPMS->status_surat == 'Selesai'){
                return view('admin.detail.diproses.Diproses_perpanjangan_masa', compact('daftarSPMS','user','biodata_user'));
            }
            if($daftarSPMS->status_surat == 'Ditolak'){
                return view('admin.detail.ditolak.ditolak_perpanjangan_masa', compact('daftarSPMS','user','biodata_user'));
            }
        }
    }
}

