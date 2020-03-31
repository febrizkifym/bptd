@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="{{route('sdm.post')}}" method="post">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Satpel</th>
                        <td>
                            <select name="satpel" id="satpel" class="form-control">
                                <?php
                                    if(isset($_GET['satpel'])){
                                        $satpel_id = $_GET['satpel'];
                                    }
                                ?>
                                @foreach($satpel as $sp)
                                    <option value="{{$sp->id}}" @if(isset($_GET['satpel'])){{$satpel_id == $sp['id']?'selected':'' }}@endif>{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="nama" class="form-control" value="{{old('nama')}}" placeholder="Beserta Titel" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Pangkat (Golongan)</th>
                        <td>
                            <input type="text" name="pangkat" class="form-control" value="{{old('pangkat')}}" placeholder="Contoh : Penata Tkt. I (III/d)" required> 
                        </td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>
                            <input type="text" name="jabatan" class="form-control" value="{{old('jabatan')}}" placeholder="Ditulis Dengan Lengkap" required> 
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