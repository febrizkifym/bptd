@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-flag"></i> </span>
              <h5>Data Calon Penumpang</h5>
              </div>
              <div class="widget-content nopadding">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Pendaftaran</th>
                            <td>{{$p->uid}}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{$p->nama}}</td>
                        </tr>
                        <tr>
                            <th>No KTP</th>
                            <td>{{$p->no_ktp}}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>{{$p->no_hp}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{$p->jenis_kelamin}}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td style="text-transform:capitalize">{{$p->agama}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Usia</th>
                            <td>
                                @if($p->jenis_usia=1)
                                    Dewasa (Lebih dari 12 tahun)
                                @else
                                    Anak-Anak (Kurang dari 12 tahun)
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kapal (Tujuan)</th>
                            <td>{{$p->kapal}} ({{$p->tujuan}})</td>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <td style="text-transform:capitalize">{{$p->kelas}}</td>
                        </tr>
                        <tr>
                            <th>Tarif</th>
                            <td>Rp.{{$p->harga}}</td>
                        </tr>
                        <tr>
                            <th>Seat</th>
                            <form action="{{route('penumpang.update_seat',$p->uid)}}" method="post">
                            @csrf
                            <td>
                            
                            <div class="alert alert-info">
                                <button class="close" data-dismiss="alert">×</button>
                                Klik dua kali pada kotak teks untuk mengedit.
                            </div>
                            <input type="text" class="form-control" name="seat" value="{{$p->seat}}" readonly ondblclick="this.readOnly='';" onblur="this.readOnly=true">
                                <br><input type="submit" value="Simpan" class="btn btn-info btn-mini">
                            </td>
                            </form>
                            
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($p->status == "pending")
                                    <div class="alert alert-warning alert-status" role="alert">
                                        <h4>PENDING</h4>
                                    </div>
                                @elseif($p->status == "konfirmasi")
                                    <div class="alert alert-success alert-status" role="alert">
                                        <h4>KONFIRMASI</h4>
                                    </div>
                                @elseif($p->status == "batal")
                                    <div class="alert alert-danger alert-status" role="alert">
                                        <h4>BATAL</h4>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Ubah Status</th>
                            <td>
                                <form action="{{route('penumpang.update_status',$p->uid)}}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <select name="status" id="" class="span6">
                                            <option value="pending" {{$p->status=='pending'?'selected':''}}>Pending</option>
                                            <option value="konfirmasi" {{$p->status=='konfirmasi'?'selected':''}}>Konfirmasi</option>
                                            <option value="batal" {{$p->status=='batal'?'selected':''}}>Batal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="keterangan" placeholder="Keterangan" value="{{$p->keterangan}}" class="span6">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                    <br>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <a href="{{route('penumpang.index')}}"><button class="btn">Kembali</button></a>
                            </td>
                        </tr>
                    </table>
              </div>
    </div>
@endsection
@section('script')
<script>
    $("#btn_konfirmasi").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Konfirmasi Tiket?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
    $("#btn_batal").click(function(e){
        e.preventDefault();
        const url = $(this).attr("href");
        swal({
            title: "Batalkan Tiket?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection