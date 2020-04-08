<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpel;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use File;
use Storage;

class SatpelController extends Controller
{
    public $path;
    
    public function __construct(){
        $this->middleware('auth');
        $this->path = public_path('img');
    }
    public function index(){
        $satpel = Satpel::all();
        return view('admin/satpel/index',['satpel' => $satpel]);
    }
    public function detail($id){
        $sp = Satpel::find($id);
        return view('admin/satpel/detail',['sp' => $sp]);
    }
    public function add(){
        return view('admin/satpel/add');
    }
    public function post(Request $r){
        $this->validate($r, [
            'struktur' => 'image|mimes:jpg,png,jpeg',
            'gambar' => 'image|mimes:jpg,png,jpeg'
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => 'Format file harus berupa jpg,jpeg,png',
        ]);
        
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        
        $sp = new Satpel;
        $sp->nama = $r->nama;
        $sp->alamat = $r->alamat;
        $sp->tupoksi = $r->tupoksi;
            
        if($r->struktur){
            $struktur = $r->file('struktur');
            
            $struktur_filename = 'struktur_'.Str::slug($r->nama,'_'). '.' . $struktur->getClientOriginalExtension();
            Image::make($struktur)->resize(1280,480,function($const){
                $const->aspectRatio();
            })->save($this->path.'/'.$struktur_filename);
            $sp->struktur = $struktur_filename;
        }
        
        if($r->gambar){
            $gambar = $r->file('gambar');
            $gambar_filename = 'gambar_'.Str::slug($r->nama,'_'). '.' . $gambar->getClientOriginalExtension();
            Image::make($gambar)->resize(1366,768,function($const){
                $const->aspectRatio();
            })->save($this->path.'/'.$gambar_filename);
            $sp->gambar = $gambar_filename;
        }
        $sp->save();
    
        return redirect(route('satpel.index'))->with(['pesan'=>'berhasil']);
    }
    public function update(Request $r,$id){
        $this->validate($r, [
            'struktur' => 'image|mimes:jpg,png,jpeg|max:2048',
            'gambar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => 'Format file harus berupa jpg,jpeg,png',
            'max' => 'Ukuran file gambar tidak bisa lebih dari 2 MB',
        ]);
        
        $sp = Satpel::find($id);
        $sp->nama = $r->nama;
        $sp->alamat = $r->alamat;
        $sp->tupoksi = $r->tupoksi;
        
        if($r->struktur){
            $struktur_old = $sp->struktur;
            $struktur = $r->file('struktur');
            $struktur_filename = 'struktur_'.Str::slug($r->nama,'_'). '.' . $struktur->getClientOriginalExtension();
            Image::make($struktur)->resize(1280,480,function($const){
                $const->aspectRatio();
            })->save($this->path.'/'.$struktur_filename);
            Storage::delete('img/'.$struktur_old);
            $sp->struktur = $struktur_filename;
        }
        if($r->gambar){
            $gambar_old = $sp->gambar;
            $gambar = $r->file('gambar');
            $gambar_filename = 'gambar_'.Str::slug($r->nama,'_'). '.' . $gambar->getClientOriginalExtension();
            Image::make($gambar)->resize(1366,768,function($const){
                $const->aspectRatio();
            })->save($this->path.'/'.$gambar_filename);
            Storage::delete('img/'.$gambar_old);
            $sp->gambar = $gambar_filename;
        }
        
        $sp->save();
        return redirect(route('satpel.detail',$id))->with(['pesan'=>'berhasil']);
    }
}
