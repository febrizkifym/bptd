@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Detail</h5>
            </div>
            <div class="widget-content">
               <div class="alert alert-info">
              <button class="close" data-dismiss="alert">×</button>
              Klik dua kali pada kotak teks untuk mengedit.</div>
               <form action="{{route('satpel.update',$sp->id)}}" method="post" enctype="multipart/form-data">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="{{$sp->nama}}" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true"> 
                            @if($errors->has('nama'))
                            <div class="alert alert-error">
                                {{$errors->first('nama')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>
                            <textarea name="alamat" id="" cols="30" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">{{$sp->alamat}}</textarea>
                            @if($errors->has('alamat'))
                            <div class="alert alert-error">
                                {{$errors->first('alamat')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tupoksi</th>
                        <td>
                            <textarea name="tupoksi" id="" cols="50" rows="2" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">{{$sp->tupoksi}}</textarea>
                            @if($errors->has('tupoksi'))
                            <div class="alert alert-error">
                                {{$errors->first('tupoksi')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Struktur</th>
                        <td>
                            @if($sp->struktur)
                                <a href="{{url('storage/img').'/'.$sp->struktur}}"><img src="{{url('storage/img').'/'.$sp->struktur}}" alt="" class="img-thumbnail"></a>
                            @else
                            <span class="label label-warning">Belum Diinput</span>
                            <div>(Ukuran foto yang disarakan = 1280x768)</div>
                            @endif
                            <hr>
                            <input type="file" name="struktur">
                            @if($errors->has('struktur'))
                            <div class="alert alert-error">
                                {{$errors->first('struktur')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if($sp->gambar)
                                <a href="{{url('storage/img').'/'.$sp->gambar}}"><img src="{{url('storage/img').'/'.$sp->gambar}}" alt="" class="img-thumbnail"></a>
                            @else
                            <span class="label label-warning">Belum Diinput</span>
                            <div>(Ukuran foto yang disarakan = 1280x768)</div>
                            @endif
                            <hr>
                            <input type="file" name="gambar">
                            @if($errors->has('gambar'))
                            <div class="alert alert-error">
                                {{$errors->first('gambar')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{route('satpel.index')}}"><button class="btn" type="button">Kembali</button></a></td>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection