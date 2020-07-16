@extends('layouts/admin')

@section('content')  
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Tambah Data</h5></div>
                <div class="widget-content">
                    <form action="{{route('tvinformasi.kegiatan_update',$k->id)}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Kegiatan</th>
                                <td>
                                    <input type="text" name="kegiatan" class="form-control" value="{{$k->kegiatan}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <td>
                                    <input type="date" name="date" class="form-control" value="{{$k->date}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="keterangan" class="form-control" value="{{$k->keterangan}}"> 
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection