<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpel;
use App\Berita;
use App\Galeri;
use App\Video;
use App\Beranda;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::where('public',1)->orderby('created_at','desc')->take(3)->get();
        $b = Beranda::first();
        return view('beranda',['berita'=>$berita,'b'=>$b]);
    }
    public function sejarah()
    {
        $b = Beranda::first();
        return view('sejarah',['b'=>$b]);
    }
    public function visimisi()
    {
        return view('visimisi');
    }
    public function satpel($id)
    {
        $sp = Satpel::find($id);
        return view('satpel',['sp' => $sp]);
    }
    public function galeri()
    {
        $berita = Galeri::join('web_berita','web_galeri.id_berita','web_berita.id')->groupBy('id_berita')->orderby('web_berita.post_date','desc')->get();
        return view('galeri',['berita'=>$berita]);
    }
    public function video()
    {
        $video = Video::all();
        $terkini = Berita::orderby('post_date','desc')->take(6)->get();
        return view('video',['video'=>$video,'terkini'=>$terkini]);
    }
    public function link_keselamatan()
    {
        return view('link_keselamatan');
    }
    public function berita()
    {
        $berita = Berita::where('public',1)->orderby('post_date','desc')->get();
        $terpopuler = Berita::orderby('view_count','desc')->take(6)->get();
        return view('berita',['berita'=>$berita,'terpopuler'=>$terpopuler]);
    }
    public function single($id,$slug){
        $b = Berita::find($id);
        $terkini = Berita::orderby('post_date','desc')->take(6)->get();
        if($slug == $b->slug){
            $b->view_count++;
            $b->save();
            return view('single',['b'=>$b,'terkini'=>$terkini]);
        }else{
            return abort(404);
        }
    }

    // Wisata

    public function torosiaje(){
        return view("wisata.torosiaje");
    }

    public function pantairatu(){
        return view("wisata.pantairatu");
    }
}
