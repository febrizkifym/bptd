@extends('layouts/admin')
@section('content')
<div class="row-fluid">
    <div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-envelope"></i> </span>
        <h5>Klasifikasi Surat</h5>
        </div>
        <div class="widget-content nopadding">
        <div class="table-responsive" style="overflow-x:auto">
            <table class="table table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Klasifikasi</th>
                        <th>Kode Surat</th>
                        <th>Sub</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($klasifikasi as $k)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$k->klasifikasi}}</td>
                        <td>{{$k->kode}}</td>
                        <td>{{$k->sub}}</td>
                        <td>{{$k->keterangan}}</td>
                        <td>
                        @if(Auth::user()->role == 'admin')
                            <a href="{{route('surat.klasifikasi_edit',$k->id)}}"><button class="btn btn-warning btn-mini">Edit</button></a>
                            <a href="{{route('surat.klasifikasi_delete',$k->id)}}"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
            <div class="widget-content nopadding">
                <form action="{{route('surat.klasifikasi_post')}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Klasifikasi</th>
                            <td>
                                <input type="text" name="klasifikasi" class="form-control" value="{{old('klasifikasi')}}" placeholder="Contoh: KEUANGAN" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Kode (Pokok Masalah)</th>
                            <td>
                                <input type="text" name="kode" class="form-control" value="{{old('kode')}}" placeholder="Contoh: KU" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Sub (Sekunder dan Tertier)</th>
                            <td>
                                <input type="text" name="sub" class="form-control" value="{{old('sub')}}" placeholder="Contoh: 001" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="keterangan" class="form-control" value="{{old('keterangan')}}" placeholder="Contoh: Perencanaan Anggaran" required> 
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