<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpel;
use App\Berita;
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
        return view('beranda',['berita'=>$berita]);
    }
    public function sejarah()
    {
        return view('sejarah');
    }
    public function satpel($id)
    {
        $sp = Satpel::find($id);
        return view('satpel',['sp' => $sp]);
    }
    public function galeri()
    {
        return view('galeri');
    }
    public function berita()
    {
        $berita = Berita::where('public',1)->get();
        $terpopuler = Berita::orderby('view_count','desc')->take(3)->get();
        return view('berita',['berita'=>$berita,'terpopuler'=>$terpopuler]);
    }
    public function single($id,$slug){
        $b = Berita::find($id);
        $terpopuler = Berita::orderby('view_count','desc')->take(3)->get();
        if($slug == $b->slug){
            $b->view_count++;
            $b->save();
            return view('single',['b'=>$b,'terpopuler'=>$terpopuler]);
        }else{
            return abort(404);
        }
    }
}
