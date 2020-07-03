@extends('layouts/admin')
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Tambah Data</h5></div>
            <div class="widget-content nopadding">
                <form action="{{route('surat.klasifikasi_update',$k->id)}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Klasifikasi</th>
                            <td>
                                <input type="text" name="klasifikasi" class="form-control" value="{{$k->klasifikasi}}" placeholder="Contoh: KEUANGAN" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kode (Pokok Masalah)</th>
                            <td>
                                <input type="text" name="kode" class="form-control" value="{{$k->kode}}" placeholder="Contoh: KU" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Sub (Sekunder dan Tertier)</th>
                            <td>
                                <input type="text" name="sub" class="form-control" value="{{$k->sub}}" placeholder="Contoh: 001" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="keterangan" class="form-control" value="{{$k->keterangan}}" placeholder="Contoh: Perencanaan Anggaran" required> 
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