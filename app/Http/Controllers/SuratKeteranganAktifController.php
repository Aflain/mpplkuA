<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\SuratKeteranganAktif;
use App\Models\User;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Support\Facades\Storage;
class SuratKeteranganAktifController extends Controller
{ 
    public function index()
    {
        $surat_keterangan_aktif = SuratKeteranganAktif::all();
        return view('user.surat.suratketeranganaktif');
    }
 
    public function create()
    {
        return view('user/surat/surat-keterangan-aktif');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            //name di form
            'keperluan' => 'required',
            'fileKTM' => 'required|image|max : 1024',
            'fileBayarSPP' => 'required',
        ]);
        
        $data                      = new SuratKeteranganAktif(); //object surat keterangan aktif
        $data->users_id            = Auth::id();
        $data->keperluan           = $request->input('keperluan');

        //Validasi and request
        if ($request->hasFile('fileKTM')) //name di form
        {
            $file = $request->fileKTM;
            $filename = 'KTM - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
            $path = "SuratKeteranganAktif/KTM/";

            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileKTM                  = $request->fileKTM; //name form
            $data->fileKTM            = 'SuratKeteranganAktif/KTM/'.$fileKTM->getClientOriginalName();
        }
        //file pdf
        if ($request->hasFile('fileBayarSPP')) //name di form
        {
            $file = $request->fileBayarSPP;
            $filename = 'BayarSPP - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
            $path = "SuratKeteranganAktif/BayarSPP/";

            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileBayarSPP                      = $request->fileBayarSPP; //name form
            $data->fileBayarSPP                = 'SuratKeteranganAktif/BayarSPP/'.$fileBayarSPP->getClientOriginalName();
        }

        $data->save();

        return redirect('/user/dashboard')->with('success', 'Pengajuan surat berhasil');
    }

    //show detail in dashboard
    public function show($id)
    {
        $data           = SuratKeteranganAktif::where('id',$id)->first();
        $biodata_user   = BiodataUser::where('users_id',$data->users_id)->first();
        return view('user/surat/detail-surat-keterangan_aktif/detail',compact('data'));
    }
 
    public function update($id, $status_surat)
    {
        $data                      = SuratKeteranganAktif::where('id',$id)->first(); //object surat keterangan aktif
        $data->status_surat        = $status_surat;
        if($data->status_surat == 'Ditolak'){
            $data->alasan_penolakan = $request->alasan_penolakan;
        }
        $data->save();
        if($data->status_surat == 'Diproses'){
            return redirect(route('admin-diprosesketeranganaktif', $id));
        }
        if($data->status_surat == 'Ditolak'){
            return redirect(route('admin-ditolakketeranganaktif', $id));
        }
    }
 
    public function destroy($id)
    {
        $data = SuratKeteranganAktif::findOrFail($id);
        $data->delete();
 
        return redirect('/admin/dashboard')->with('success','Deleted successfully');//belum fix route redirectnya
    }
}