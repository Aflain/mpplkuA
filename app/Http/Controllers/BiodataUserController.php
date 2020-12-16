<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class BiodataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BiodataUser  $biodataUser
     * @return \Illuminate\Http\Response
     */
    public function updateBiodata(Request $request)
    {
        //kiri nama di db                   kanan req nama di field form name
        $biodata_user = BiodataUser::where('id', $request->id)->first();
        // dd($biodata_user);
        $biodata_user->users_id         =  Auth::id();
        $biodata_user->id               =  $request->input('id');
        $biodata_user->jenis_Kelamin    =  $request->input('jeniskelamin');
        $biodata_user->nomor_Telepon    =  $request->input('nomortelepon');
        $biodata_user->asal_Prodi       =  $request->input('asalprodi');
        $biodata_user->departemen       =  $request->input('departemen');
        $biodata_user->semester         =  $request->input('semester');
        $biodata_user->tahun_Akademik   =  $request->input('tahunakademik');
        $biodata_user->save();
        return redirect('/user/biodata')->with('success', 'Biodata berhasil disimpan!');
    }

}
