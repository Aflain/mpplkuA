<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\SuratPerpanjanganMasaStudi;
use App\Models\User;
use App\Models\BiodataUser;
use Auth;
use Illuminate\Support\Facades\Storage;
class SuratPerpanjanganMasaStudiController extends Controller
{ 
    //view data
    public function index()
    {
        $surat_perpanjangan_masa_studi = SuratPerpanjanganMasaStudi::all();
        return view('user.surat.suratperpanjanganmasastudi');
    }
 
    public function create()
    {
        return view('user/surat/surat-perpanjangan-masa-studi');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            'waktuAkhirPerpanjangan' => 'required',
            'waktuAkhirPerpanjangan_TahunAkademik' => 'required',
            'fileTabelRencanaStudi' => 'required',
        ]);
        
        $data                                       = new SuratPerpanjanganMasaStudi(); //object surat perpanjangan masa studi
        $data->users_id                             = Auth::id();
        $data->waktuAkhirPerpanjangan               = $request->input('waktuAkhirPerpanjangan');
        $data->waktuAkhirPerpanjangan_TahunAkademik = $request->input('waktuAkhirPerpanjangan_TahunAkademik');

         //Validasi and request
         if ($request->hasFile('fileTabelRencanaStudi')) //name di form
         {
             $file = $request->fileTabelRencanaStudi;
             $filename = 'TabelRencanaStudi - ' . $data->users_id . ' - ' . $file->getClientOriginalName();
             $path = "SuratPerpanjanganMasaStudi/TabelRencanaStudi/";
 
             Storage::disk('local')->put($path.$filename,file_get_contents($file));
             $fileTabelRencanaStudi                       = $request->fileTabelRencanaStudi; //name form
             $data->fileTabelRencanaStudi            = 'SuratPerpanjanganMasaStudi/TabelRencanaStudi/'.$fileTabelRencanaStudi->getClientOriginalName();
         }

         $data->save();

        return redirect('/user/dashboard')->with('success', 'Pengajuan surat berhasil');
    }

    //show detail in dashboard
    public function show($id)
    {
        $data           = SuratPerpanjanganMasaStudi::where('id',$id)->first();
        $biodata_user   = BiodataUser::where('users_id',$data->users_id)->first();
        return view('user/surat/surat-perpanjangan-masa-studi/detail',compact('data'));
    }
 
    public function update(Request $request, $id)
    {   
        $data = SuratPerpanjanganMasaStudi::where('id',$id)->first(); //object surat perpanjangan masa studi
        
        if($data->status_surat == 'Pending'){
            if($request->status_surat == 'Diproses' || $request->status_surat == 'Ditolak'){
                $data->status_surat = $request->status_surat;
                $data->save();
            }
            return redirect(route('admin-suratperpanjanganmasa', $id));
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
        $data = SuratPerpanjanganMasaStudi::findOrFail($id);
        $data->delete();
 
        return redirect('/admin/dashboard')->with('success','Deleted successfully');//belum fix route redirectnya
    }
}