@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"><h5>Edit Data</h5></div>
            <div class="widget-content">
                <form action="{{route('ppid.update',$p->id)}}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                        <tr>
                            <th>Tanggal Informasi</th>
                            <td>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{$p->tanggal}}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Jenis PPID</th>
                            <td>
                                <div class="controls">
                                <select name="jenis" class="span4 select2">
                                <option value="berkala">Informasi Berkala</option>
                                <option value="sertamerta">Informasi Serta Merta</option>
                                <option value="setiapsaat">Informasi Setiap Saat</option>
                                <option value="dikecualikan">Informasi Dikecualikan</option>
                                </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>
                                <input type="text" name="judul" class="form-control" value="{{$p->judul}}" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{$p->deskripsi}}</textarea>
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
@section('script')
@endsection