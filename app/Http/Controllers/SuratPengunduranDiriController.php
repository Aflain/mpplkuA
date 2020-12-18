<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\SuratPengunduranDiri;
use App\Models\User;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Support\Facades\Storage;
class SuratPengunduranDiriController extends Controller
{ 
    //view data
    public function index()
    {
        $surat_pengunduran_diri = SuratPengunduranDiri::all();
        return view('user.surat.suratpengundurandiri');
    }
 
    public function create()
    {
        return view('user/surat/surat-pengunduran-diri');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            'tahunAkademikPengunduran' => 'required',
            'tanggalPengunduran' => 'required',
            'tahunTerakhirAktif' => 'required',
            'fileKTM' => 'required|image|max : 1024',
            'fileSuratPengajuanMahasiswa' => 'required',
            'fileSuratPengantarDept' => 'required',
        ]);
        
        $data                               = new SuratPengunduranDiri(); //object surat pengunduran diri
        $data->users_id                     = Auth::id();
        $data->tahunAkademikPengunduran     = $request->input('tahunAkademikPengunduran');
        $data->tanggalPengunduran           = $request->input('tanggalPengunduran');
        $data->tahunTerakhirAktif           = $request->input('tahunTerakhirAktif');

         //Validasi and request
         
        if ($request->hasFile('fileKTM')) //name di form
        {
            $file = $request->fileKTM;
            $filename = 'KTM - ' . $data->user_id . ' - ' . $file->getClientOriginalName();
            $path = "SuratPengunduranDiri/KTM/";

            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileKTM                  = $request->fileKTM; //name form
            $data->fileKTM            = 'SuratPengunduranDiri/KTM/'.$fileKTM->getClientOriginalName();
        }

        if ($request->hasFile('fileSuratPengajuanMahasiswa')) //name di form
        {
            $file = $request->fileSuratPengajuanMahasiswa;
            $filename = 'SuratPengajuanMahasiswa - ' . $data->user_id . ' - ' . $file->getClientOriginalName();
            $path = "SuratPengunduranDiri/SuratPengajuanMahasiswa/";
            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileSuratPengajuanMahasiswa                       = $request->fileSuratPengajuanMahasiswa; //name form
            $data->fileSuratPengajuanMahasiswa            = 'SuratPengunduranDiri/SuratPengajuanMahasiswa/'.$fileSuratPengajuanMahasiswa->getClientOriginalName();
        }

        if ($request->hasFile('fileSuratPengantarDept')) //name di form
        {
            $file = $request->fileSuratPengantarDept;
            $filename = 'SuratPengantarDept - ' . $data->user_id . ' - ' . $file->getClientOriginalName();
            $path = "SuratPengunduranDiri/SuratPengantarDept/";
 
            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileSuratPengantarDept                       = $request->fileSuratPengantarDept; //name form
            $data->fileSuratPengantarDept            = 'SuratPengunduranDiri/SuratPengantarDept/'.$fileSuratPengantarDept->getClientOriginalName();
        }

        $data->save();

        return redirect('/user/dashboard')->with('success', 'Pengajuan surat berhasil');
    }

    //show detail
    public function show($id)
    {
        $data           = SuratPengunduranDiri::where('id',$id)->first();
        $biodata_user   = BiodataUser::where('users_id',$data->users_id)->first();
        return view('user/surat/surat-pengunduran-diri/detail',compact('data'));
    }
 
    public function update(Request $request, $id)
    {   
        $data = SuratPengunduranDiri::where('id',$id)->first(); //object surat pengunduran diri
        
        if($data->status_surat == 'Pending'){
            if($request->status_surat == 'Diproses' || $request->status_surat == 'Ditolak'){
                $data->status_surat = $request->status_surat;
                $data->save();
            }
            return redirect(route('admin-suratpengundurandiri', $id));
        }
        
        if($data->status_surat == 'Diproses'){
            if($request->status_surat == 'Selesai'){
                $data->status_surat = $request->status_surat;
                $data->save();
                return redirect(route('admin-selesai'));
            }
        }
        
        if($data->status_surat == 'Ditolak'){
            $data->alasan_penolakan = $request->alasan_penolakan;
            $data->save();
            return redirect(route('admin-ditolak'));
        }
        abort(404);
    }
 
    public function destroy($id)
    {
        $data = SuratPengunduranDiri::findOrFail($id);
        $data->delete();
 
        return redirect('/admin/dashboard')->with('success','Deleted successfully');//belum fix route redirectnya
    }
}