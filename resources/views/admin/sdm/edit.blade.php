@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Edit Data</h5>
            </div>
            <div class="widget-content">
               <form action="{{route('sdm.update',$sdm->id)}}" method="post">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Satpel</th>
                        <td>
                            <select name="satpel" id="satpel" class="form-control">
                                @foreach($satpel as $sp)
                                    <option value="{{$sp->id}}" {{$sdm['satpel'] == $sp['id']?'selected':'' }}>{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="{{$sdm['nama']}}" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Pangkat (Golongan)</th>
                        <td>
                            <input type="text" name="pangkat" class="form-control" value="{{$sdm['pangkat']}}" placeholder="Contoh : Penata Tkt. I (III/d)" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>
                            <input type="text" name="jabatan" class="form-control" value="{{$sdm['jabatan']}}" required> 
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{route('sdm.index')}}"><button class="btn" type="button">Kembali</button></a></td>
                    </tr>
                </table>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection