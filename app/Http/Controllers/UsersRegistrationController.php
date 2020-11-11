<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
 
class UsersRegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    
    public function store()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'nim' => 'required',
            'departemen' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::create(request(['nama', 'nim', 'departemen', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/?');
    }
}