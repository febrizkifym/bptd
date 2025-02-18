<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Berita;
use App\User;
use Carbon\Carbon;
use Image;
use File;
use Storage;
use Auth;

class BeritaController extends Controller
{
    public $path;
    public function __construct(){
        $this->middleware(['auth']);
        $this->path = public_path('img/post');
    }
    public function index(){
        $berita = Berita::orderby('post_date','desc')->get();
        return view('admin/berita/index',['berita'=>$berita]);
    }
    public function add(){
        return view('admin/berita/add');
    }
    public function post(Request $r){
        //upload gambar
        $this->validate($r, [
            'thumbnail' => 'image|mimes:jpg,png,jpeg|max:2048',
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => 'Format file harus berupa jpg,jpeg,png',
            'max' => 'Ukuran file gambar tidak bisa lebih dari 2 MB',
        ]);
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path,0777,true);
        }
        ///
        $b = new Berita;
        $b->title = $r->title;
        $b->slug = Str::slug(Str::words($r->title,'-'));
        //thumbnail
        $thumbnail = $r->file('thumbnail');
        $thumbnail_filename = 'gambar_'.$b->slug. '.' . $thumbnail->getClientOriginalExtension();
        Image::make($thumbnail)->resize(1366,768,function($const){
            $const->aspectRatio();
        })->save($this->path.'/'.$thumbnail_filename);
        $b->thumbnail = $thumbnail_filename;
        //
        $b->content = $r->content;
        $b['public'] = 1;
        $b->created_by = Auth::user()->id;
        $b->post_date = Carbon::now();
        $b->save();
        
        return redirect(route('berita.index'))->with(['pesan'=>'berhasil']);
    }
    public function edit($id){
        $b = Berita::find($id);
        return view('admin/berita/edit',['b'=>$b]);
    }
    public function update(Request $r,$id){
        //upload gambar
        $this->validate($r, [
            'thumbnail' => 'image|mimes:jpg,png,jpeg',
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => 'Format file harus berupa jpg,jpeg,png',
        ]);
        if (!File::isDirectory($this->path)) {
              File::makeDirectory($this->path,0777,true);
        }
        ///
        $b = Berita::find($id);
        $b->title = $r->title;
        $b->slug = Str::slug(Str::words($r->title,'-'));
        //thumbnail
        if($r->thumbnail){
            $thumbnail_old = $b->thumbnail;
            $thumbnail = $r->file('thumbnail');
            $thumbnail_filename = 'gambar_'.$b->slug. '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(1366,768,function($const){
                $const->aspectRatio();
            })->save($this->path.'/'.$thumbnail_filename);
            Storage::delete('img/post/'.$thumbnail_old);
            $b->thumbnail = $thumbnail_filename;
        }
        //
        $b->content = $r->content;
        $b['public'] = 1;
        $b->created_by = Auth::user()->id;
        $b->save();
        
        return redirect(route('berita.index'))->with(['pesan'=>'berhasil']);
    }
    public function delete($id){
        $b = Berita::find($id);
        Storage::delete('img/post/'.$b->thumbnail);
        $b->delete();
        
        return redirect(route('berita.index'))->with(['pesan'=>'sukses']);
    }
}
