<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        // $id_user = Auth::user()->id;
        // $usr = User::where('id', $id_user)->first();
        // dd($usr->level);

        return view('admin.pengguna.index', [
            'data' => $data,
            // 'usr' => $usr,
        ]);
    }

    public function profil(Request $request)
    {
        $id_user = Auth::user()->id;
        $usr = User::where('id', $id_user)->first();

        return view('admin.pengguna.profil', [
            'usr' => $usr,
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = 'siamar@project.com';
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        // dd($user);

        return redirect('/admin/getpengguna')->with(['success' => 'Berhasil menambahkan akun']);

    }

    public function edit(Request $request, $id)
    {
        // $checkusername = User::where()
        $pengguna = User::where('id', $id)->first();
        $old_password = $pengguna->password;

        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        if($request->password != null) {
            $pengguna->password = bcrypt($request->password);
        } else {
            $pengguna->password = $old_password;
        }
        $pengguna->update();

        return redirect()->back()->with(['success' => 'Data berhasil diubah']);
        // dd($pengguna);
        // if($request->password == null) {

        // }

    }

    public function editprofil(Request $request)
    {
        $profil = User::where('id', Auth::user()->id)->first();
        $old_pass = $profil->password;
        $old_uname = $profil->username;

        $profil->name = $request->name;
        $profil->username = $request->username;
        if($request->password != null){
            $profil->password = bcrypt($request->password);
        } else {
            $profil->password = $old_pass;
        }

        $profil->update();

        if($profil->username == $old_uname) {
            return redirect()->back()->with(['success'=> 'Data profil berhasil diubah']);
        } else {
            auth()->guard('web')->logout();
            session()->flush();

            return redirect()->route('loginpage');
        }

    }

    public function hapus ($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('getpengguna')->with(['success' => 'Berhasil menghapus data']);
    }
}
