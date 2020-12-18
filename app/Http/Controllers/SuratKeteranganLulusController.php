<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\SuratKeteranganLulus;
use App\Models\User;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Support\Facades\Storage;
class SuratKeteranganLulusController extends Controller
{ 
    //view data
    public function index()
    {
        $surat_keterangan_lulus = SuratKeteranganLulus::all();
        return view('user.surat.suratketeranganlulus');
    }
 
    public function create()
    {
        return view('user/surat/surat-keterangan-lulus');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            'alamatAsal' => 'required',
            'alamatBogor' => 'required',
            'fileSuratPengantarDept' => 'required',
            'fileLembarPengesahan' => 'required',
            'fileTranskrip' => 'required',
            'fileSkripsi' => 'required',
            'fileBayarSPP' => 'required',
            'fileBuktiBayarWisuda' => 'required',
            'fileFoto' => 'image|image|max : 1024',
        ]);
        
        $data                           = new SuratKeteranganLulus(); //object surat keterangan lulus
        $data->users_id                 = Auth::id(); 
        $data->alamatAsal               = $request->input('alamatAsal');
        $data->alamatBogor              = $request->input('alamatBogor');

         //Validasi and request
         if ($request->hasFile('fileSuratPengantarDept')) //name di form
         {
             $file = $request->fileSuratPengantarDept;
             $filename = 'SuratPengantarDept - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/SuratPengantarDept/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileSuratPengantarDept                       = $request->fileSuratPengantarDept; //name form
             $data->fileSuratPengantarDept            = 'SuratKeteranganLulus/SuratPengantarDept/'.$fileSuratPengantarDept->getClientOriginalName();
         }

         if ($request->hasFile('fileLembarPengesahan')) //name di form
         {
             $file = $request->fileLembarPengesahan;
             $filename = 'LembarPengesahan - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/LembarPengesahan/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileLembarPengesahan                       = $request->fileLembarPengesahan; //name form
             $data->fileLembarPengesahan            = 'SuratKeteranganLulus/LembarPengesahan/'.$fileLembarPengesahan->getClientOriginalName();
         }
         
         if ($request->hasFile('fileTranskrip')) //name di form
         {
             $file = $request->fileTranskrip;
             $filename = 'Transkrip - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/Transkrip/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileTranskrip                      = $request->fileTranskrip; //name form
             $data->fileTranskrip                      = 'SuratKeteranganLulus/Transkrip/'.$fileTranskrip->getClientOriginalName();
         }
         
         if ($request->hasFile('fileSkripsi')) //name di form
         {
             $file = $request->fileSkripsi;
             $filename = 'Skripsi - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/Skripsi/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileSkripsi                       = $request->fileSkripsi; //name form
             $data->fileSkripsi            = 'SuratKeteranganLulus/Skripsi/'.$fileSkripsi->getClientOriginalName();
         }

        
         if ($request->hasFile('fileBayarSPP')) //name di form
         {
             $file = $request->fileBayarSPP;
             $filename = 'BayarSPP - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/BayarSPP/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileBayarSPP                       = $request->fileBayarSPP; //name form
             $data->fileBayarSPP            = 'SuratKeteranganLulus/BayarSPP/'.$fileBayarSPP->getClientOriginalName();
         }

         if ($request->hasFile('fileBuktiBayarWisuda')) //name di form
         {
             $file = $request->fileBuktiBayarWisuda;
             $filename = 'BuktiBayarWisuda - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/BuktiBayarWisuda/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileBuktiBayarWisuda                       = $request->fileBuktiBayarWisuda; //name form
             $data->fileBuktiBayarWisuda            = 'SuratKeteranganLulus/BuktiBayarWisuda/'.$fileBuktiBayarWisuda->getClientOriginalName();
         }
         
         if ($request->hasFile('fileFoto')) //name di form
         {
             $file = $request->fileFoto;
             $filename = 'Foto - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratKeteranganLulus/Foto/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileFoto                       = $request->fileFoto; //name form
             $data->fileFoto            = 'SuratKeteranganLulus/Foto/'.$fileFoto->getClientOriginalName();
         }

         $data->save();

        return redirect('/user/dashboard')->with('success', 'Pengajuan surat berhasil');
    }

    //show detail in dashboard
    public function show($id)
    {
        $data           = SuratKeteranganLulus::where('id',$id)->first();
        $biodata_user   = BiodataUser::where('users_id',$data->users_id)->first();
        return view('user/surat/surat-keterangan-lulus/detail',compact('data'));
    }
 
    public function update(Request $request, $id)
    {   
        $data = SuratKeteranganLulus::where('id',$id)->first(); //object surat keterangan lulus
        
        if($data->status_surat == 'Pending'){
            if($request->status_surat == 'Diproses' || $request->status_surat == 'Ditolak'){
                $data->status_surat = $request->status_surat;
                $data->save();
            }
            return redirect(route('admin-suratketeranganlulus', $id));
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
        $data = SuratKeteranganLulus::findOrFail($id);
        $data->delete();
 
        return redirect('/admin/dashboard')->with('success','Deleted successfully');//belum fix route redirectnya
    }
}

