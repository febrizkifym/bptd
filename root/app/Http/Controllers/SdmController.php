<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpel;
use App\Sdm;

class SdmController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $satpel = Satpel::all();
        $sdm = Sdm::all();
        return view('admin/sdm/index',[
            'satpel'=>$satpel,
//            'sumberdaya'=>$sdm
        ]);
    }
    public function add(){
        $satpel = Satpel::all();
        return view('admin/sdm/add',['satpel'=>$satpel]);
    }
    public function post(Request $r){
        $sdm = new Sdm;
        $sdm->satpel = $r->satpel;
        $sdm->nama = $r->nama;
        $sdm->pangkat = $r->pangkat;
        $sdm->jabatan = $r->jabatan;
        
//        dd($sp);
        $sdm->save();
        return redirect(route('sdm.index'))->with(['pesan'=>'berhasil']);
    }
    public function edit($id){
        $satpel = Satpel::all();
        $sdm = Sdm::find($id);
        return view('admin/sdm/edit',['sdm'=>$sdm,'satpel'=>$satpel]);
    }
    public function update(Request $r,$id){
        $sdm = Sdm::find($id);
        $sdm->satpel = $r->satpel;
        $sdm->nama = $r->nama;
        $sdm->pangkat = $r->pangkat;
        $sdm->jabatan = $r->jabatan;
        
        $sdm->save();
        return redirect(route('sdm.index'))->with(['pesan'=>'berhasil']);
    }
    public function delete($id){
        $sdm = Sdm::find($id);
        $sdm->delete();
        return redirect(route('sdm.index'))->with(['pesan'=>'berhasil']);
    }
}
