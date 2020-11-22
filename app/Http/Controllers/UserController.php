<?php

namespace App\Http\Controllers;

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
        return view('user.dashboard');
    }

    public function viewBiodata()
    {
        return view('user.biodata');
    }

    public function viewBiodataEdit()
    {
        return view('user.biodata-edit');
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