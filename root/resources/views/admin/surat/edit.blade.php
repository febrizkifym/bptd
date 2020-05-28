@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Edit Data</h5></div>
                <div class="widget-content">
                    <form action="{{route('surat.update',$s->id)}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Kode Surat</th>
                                <td>
                                    <input type="text" name="kode_surat" class="form-control" value="{{$s->kode_surat}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Urut</th>
                                <td>
                                    <input type="number" min="0" name="no_urut" id="no_urut" class="form-control" value="{{$s->no_urut}}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>
                                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" value="{{$s->tgl_surat}}" required>
                                    <input type="hidden" name="bulan" id="bulan"> 
                                </td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>
                                    <input type="text" name="tujuan" class="form-control" value="{{$s->tujuan}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Isi Surat</th>
                                <td>
                                    <input type="text" name="perihal" class="form-control" value="{{$s->perihal}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>
                                    <input type="text" name="ket" class="form-control" value="{{$s->ket}}"> 
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
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
        var no_urut = {{$s->no_urut}};
        if($("#cek_no").is(":checked")){
            $("#no_urut").val(no_urut-1);
        }else{
            $("#no_urut").val(no_urut);
        }
    });
</script>
@endsection