<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\LegalisasiTranskrip;
use App\Models\User;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Support\Facades\Storage;
class LegalisasiTranskripController extends Controller
{ 
    //view data
    public function index()
    {
        $legalisasi_transkrip = LegalisasiTranskrip::all();
        return view('user.surat.legalisirtranskrip');
    }
 
    public function create()
    {
        return view('user/surat/legalisir-transkrip');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            //name di form
            'keperluan' => 'required',
            'fileKTM' => 'required|image|max : 1024',
            'fileTranskrip' => 'required',
        ]);
        
        $data                      = new LegalisasiTranskrip(); //object legalisir transkrip
        $data->users_id            = Auth::id(); 
        $data->keperluan           = $request->input('keperluan');
        

         //Validasi and request
         if ($request->hasFile('fileKTM')) //name di form
         {
             $file = $request->fileKTM;
             $filename = 'KTM - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "LegalisasiTranskrip/KTM/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileKTM                       = $request->fileKTM; //name form
             $data->fileKTM            = 'LegalisasiTranskrip/KTM/'.$fileKTM->getClientOriginalName();
         }
         //file pdf
         if ($request->hasFile('fileTranskrip')) //name di form
         {
             $file = $request->fileTranskrip;
             $filename = 'Transkrip - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "LegalisasiTranskrip/Transkrip/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileTranskrip                      = $request->fileTranskrip; //name form
             $data->fileTranskrip                      = 'LegalisasiTranskrip/Transkrip/'.$fileTranskrip->getClientOriginalName();
         }

         $data->save();

        return redirect('/user/dashboard')->with('success', 'Pengajuan surat berhasil');
    }

    //show detail in dashboard
    public function show($id)
    {
        $data           = LegalisasiTranskrip::where('id',$id)->first();
        $biodata_user   = BiodataUser::where('users_id',$data->users_id)->first();
        return view('user/surat/legalisir-transkrip/detail',compact('data'));
    }
 
    public function update(Request $request, $id)
    {
        $data                      = LegalisasiTranskrip::where('id',$id)->first(); //object legalisasi transkrip
        $data->status_surat        = $request->status_surat;
        if($data->status_surat == 'Ditolak'){
            $data->alasan_penolakan = $request->alasan_penolakan;
        }
        $data->save();

        return redirect('/admin/dashboard')->with('success', 'Perubahan berhasil'); //belum fix route redirectnya
    }
 
    public function destroy($id)
    {
        $data = LegalisasiTranskrip::findOrFail($id);
        $data->delete();
 
        return redirect('/admin/dashboard')->with('success','Deleted successfully');//belum fix route redirectnya
    }
}