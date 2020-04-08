<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tvinformasi;
use App\Beranda;

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
            $video_filename = 'video_tvinformasi' . $video->getClientOriginalExtension();
            $path = storage_path().'/video/';
            $video->move($path,$video_filename);
            $b->tv_video = $video_filename;
            Storage::delete('video/'.$video_old);
            $sp->gambar = $gambar_filename;
        }

        $b->save();
        return redirect(route("dashboard"));
    }
}
