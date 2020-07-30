@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
              <h5>Calon Penumpang</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Usia</th>
                            <th>Kapal (Tujuan)</th>
                            <th>Kelas/Golongan</th>
                            <th>Tarif</th>
                            <th>Seat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($penumpang as $p)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->uid}}</td>
                            <td>{{$p->nama}}</td>
                            <td>{{$p->no_hp}}</td>
                            <td>{{$p->jenis_kelamin}}</td>
                            <td style="text-transform:capitalize">{{$p->agama}}</td>
                            <td>
                                {{$p->usia==1?"Dewasa (Lebih dari 12 Tahun)":"Anak-Anak (Kurang dari 12 Tahun)"}}
                            </td>
                            <td>
                                {{$p->kapal}} ({{$p->tujuan}})
                            </td>
                            <td style="text-transform:uppercase">{{$p->kelas}}</td>
                            <td>Rp. {{$p->harga}}</td>
                            <td>{{$p->seat}}</td>
                            <td>
                              @if($p->status == 'pending')
                              <span class="label label-warning">Pending</span>
                              @elseif($p->status == 'konfirmasi')
                              <span class="label label-success">Konfirmasi</span>
                              @elseif($p->status == 'batal')
                              <span class="label label-danger">Batal</span>
                              @endif
                            </td>
                            <td>
                                <a href="{{route('penumpang.detail',$p->uid)}}"><button style="margin:2px" class="btn btn-mini btn-primary">Detail</button></a>
                                @if(Auth::user()->role == 'admin')
                                  <a href="{{route('penumpang.delete',$p->id)}}"><button class="btn btn-mini btn-danger">Hapus</button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-table"></i> </span>
              <h5>Export Data</h5>
              </div>
              <div class="widget-content">
                <a href="{{route('penumpang.export')}}"><button class="btn btn-success">Export Excel</button></a>
              </div>
    </div>
@endsection