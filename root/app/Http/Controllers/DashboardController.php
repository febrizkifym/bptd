<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tvinformasi;
use App\Beranda;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use File;
use Storage;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $b = Beranda::first();
        return view('admin/dashboard',['b'=>$b]);
    }
    public function updatetv(Request $r){
        $this->validate($r, [
            'tv_video' => 'mimes:mp4|max:100040'
        ],[
            'mimes' => 'Format file harus berupa mp4',
        ]);
        $b = Beranda::first();
        $b->tv_runningtext = $r->tv_runningtext;
        
        if($r->tv_video){
            $video_old = $b->tv_video;
            $video = $r->file('tv_video');
            $video_filename = 'video_tvinformasi.' . $video->getClientOriginalExtension();
            $path = storage_path().'/video/';
            $video->move($path,$video_filename);
            $b->tv_video = $video_filename;
            Storage::delete('video/'.$video_old);

        }

        $b->save();
        return redirect(route("dashboard"));
    }
    public function updateberanda(Request $r){
        $this->validate($r, [
            'pengumuman' => 'mimes:jpg,jpeg,png|max:2048'
        ],[
            'mimes' => 'Format file harus berupa jpeg,jpg,png',
            'max' => 'Ukuran file tidak bisa lebih dari 2MB',
        ]);
        $b = Beranda::first();
        $b->teks = $r->teks;
        $b->sejarah = $r->sejarah;
        
        if($r->pengumuman){
            $pengumuman_old = $b->pengumuman;
            $pengumuman = $r->file('pengumuman');
            $pengumuman_filename = 'pengumuman.' . $pengumuman->getClientOriginalExtension();
            $path = public_path().'/img/';
            Image::make($pengumuman)->resize(1048,500,function($const){
                $const->aspectRatio();
            })->save($path.$pengumuman_filename);
            $b->pengumuman = $pengumuman_filename;
            Storage::delete('pengumuman/'.$pengumuman_old);
        }
        $b->save();
        return redirect(route("dashboard"));
    }
}
