<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\BiodataUser;
class UsersRegistrationController extends Controller
{
    public function create()
    {
        return view('auth.user-register');
    }
    
    public function store()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $users = User::create(request(['nama', 'nim', 'email', 'password']));
        $biodata_user = new BiodataUser;
        $biodata_user->users_id = $users->id;
        $biodata_user->jenis_Kelamin = '';
        $biodata_user->nomor_Telepon = '';
        $biodata_user->asal_Prodi = '';
        $biodata_user->departemen = '';
        $biodata_user->semester = 1;
        $biodata_user->tahun_Akademik = '';
        $biodata_user->save();
        //auth()->login($users);
        
        return redirect()->to('/login');
    }
}
