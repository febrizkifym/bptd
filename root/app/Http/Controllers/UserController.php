<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $user = User::where('role','!=','admin')->get();
        return view('admin/user/index',['user'=>$user]);
    }
    public function add(){
        return view('admin/user/add');
    }
    public function post(Request $r){
        
        $this->validate($r, [
            'username' => 'required|string|max:50',
            'email' => 'email',
        ],[
            'max' => ':attribute tidak bisa melebihi :max karakter',
            'email' => 'Kolom ini harus diisi dengan email'
        ]);
        $u = new User;
        $u->firstname = $r->firstname;
        $u->lastname = $r->lastname;
        $u->username = $r->username;
        $u->email = $r->email;
        $u->password = bcrypt($r->password);
        $u->role = 'operator';
        
        $u->save();
        return redirect(route('user.index'))->with(['pesan'=>'berhasil']);
    }
    public function edit($id){
        $u = User::find($id);
        return view('admin/user/edit',['u'=>$u]);
    }
    public function update(Request $r,$id){
        
        $this->validate($r, [
            'username' => 'required|string|max:50',
            'email' => 'email',
        ],[
            'max' => ':attribute tidak bisa melebihi :max karakter',
            'email' => 'Kolom ini harus diisi dengan email'
        ]);
        $u = User::find($id);
        $u->firstname = $r->firstname;
        $u->lastname = $r->lastname;
        $u->username = $r->username;
        $u->email = $r->email;
        if($r->password){
            $u->password = bcrypt($r->password);
        }
        $u->save();
        return redirect(route('user.index'))->with(['pesan'=>'berhasil']);
    }
    public function delete($id){
        $u = User::find($id);
        $u->delete();
        return redirect(route('user.index'))->with(['pesan'=>'berhasil']);
    }
}
