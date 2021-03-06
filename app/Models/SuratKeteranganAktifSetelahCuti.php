<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganAktifSetelahCuti extends Model
{    
    protected $table = 'surat_keterangan_aktif_setelah_cuti';
    protected $fillable = [
                           'status_surat',
                           'alasan_penolakan',
                           'waktuCuti_TahunAkademik',
                           'waktuCuti_Semester',
                           'alasanCuti',
                           'waktuAktif_TahunAkademik',
                           'waktuAktif_Semester',
                           'fileSuratCuti',
                           'fileSuratPengantarDept',
                           'fileBayarSPP',
                           'users_id',
                           'biodata_users_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id','id');
    }

    public function biodata()
    {
        return $this->belongsTo('App\Models\Biodata','biodata_users_id','id');
    }
}
