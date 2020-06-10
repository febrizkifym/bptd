@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Kapal</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Kapal</th>
                            <td>{{$k->kd_kapal}}
                             </td>
                        </tr>
                        <tr>
                            <th>Nama Kapal</th>
                            <td>{{$k->nama}}
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan</th>
                            <td>{{$k->tujuan}}
                             </td>
                        </tr>
                    </table>
              </div>
    </div>
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Tarif</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Tarif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tarif as $t)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$t['nama']}}</td>
                                <td>{!!$t['tarif']?"Rp. ".$t['tarif']:"<i>Belum diinput</i>"!!}</td>
                                <td>
                                    <a href="{{route('kapal.edit_tarif')}}?kapal={{$k['id']}}&kelas={{$t['kelas']}}&usia={{$t['jenis_usia']}}"><button class="btn btn-mini btn-warning">Edit</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
    </div>
@endsection