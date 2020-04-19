<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

// AIzaSyD-3ZbOvOe8KQ91hFsaLOaRR2wCeUW9F4Q

class VideoController extends Controller
{
    public function index(){
        $video = Video::all();
        return view('admin/video/index',['video'=>$video]);
    }
    public function post(Request $r){
        $v = new Video;
        $v->title = $r->title;
        $v->video_path = $r->video_path;
        $v->save();
        return redirect(route('video.index'));
    }
    public function delete($id){
        $v = Video::find($id);
        $v->delete();
        return redirect(route('video.index'));
    }
}
