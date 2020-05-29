@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-envelope"></i> </span>
              <h5>Arsip Surat</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="table-responsive" style="overflow-x:auto">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Tujuan</th>
                                <th>Perihal</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($surat as $s)
                            <tr>
                                <td>{{$s->no_urut}}@isset($s->sub){{'.'.$s->sub}}@endisset</td>
                                <td>{{$s->kode_surat}}/{{$s->no_urut}}@isset($s->sub){{'.'.$s->sub}}@endisset/{{$s->bulan}}/BPTD-GTLO/{{date("Y",strtotime($s->tgl_surat))}}</td>
                                <td>{{$s->tgl_surat}}</td>
                                <td>{{$s->tujuan}}</td>
                                <td>{{$s->perihal}}</td>
                                <td>{{$s->ket}}</td>
                                <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{route('surat.edit',$s->id)}}"><button class="btn btn-warning btn-mini">Edit</button></a>
                                    <a href="{{route('surat.delete',$s->id)}}"><button class="btn btn-danger btn-mini">Hapus</button></a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Tambah Data</h5></div>
                <div class="widget-content">
                    <form action="{{route('surat.post')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Kode Surat</th>
                                <td>
                                    <input type="text" name="kode_surat" class="form-control" value="{{old('kode_surat')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Urut</th>
                                <td>
                                    <input type="number" min="0" name="no_urut" id="no_urut" class="form-control" value="{{$no_urut}}" readonly required>
                                    <div class="controls">
                                        <label>
                                        <input type="checkbox" name="cek_no" id="cek_no" />
                                        Ubah Nomor Surat</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>
                                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                                    <input type="hidden" name="bulan" id="bulan"> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>
                                    <input type="text" name="tujuan" class="form-control" value="{{old('tujuan')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Isi Surat</th>
                                <td>
                                    <input type="text" name="perihal" class="form-control" value="{{old('perihal')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="ket" class="form-control" value="{{old('ket')}}"> 
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
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-table"></i> </span>
              <h5>Export Data</h5>
              </div>
              <div class="widget-content">
                <a href="{{route('surat.export')}}"><button class="btn btn-success">Export Excel</button></a>
              </div>
    </div>
@endsection
@section('script')
<script>
    function romanize(num) {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
                "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
                "","I","II","III","IV","V","VI","VII","VIII","IX"],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }
    $("#tgl_surat").change(function(){
        var tgl = new Date($("#tgl_surat").val());
        var bulan = romanize(tgl.getMonth()+1);
        $("#bulan").val(bulan);
    });
    $("#cek_no").click(function(){
        if($("#cek_no").is(":checked")){
            $("#no_urut").prop('readonly', false);
        }else{
            $("#no_urut").prop('readonly', true);
        }
    });
</script>
@endsection