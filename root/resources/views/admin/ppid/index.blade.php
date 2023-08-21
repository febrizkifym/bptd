@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Data Informasi Publik</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="table-responsive" style="overflow-x:auto">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Informasi</th>
                                <th>Jenis PPID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($ppid as $p)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->tanggal}}</td>
                                <td>
                                    <?php
                                    switch ($p->jenis) {
                                        case 'berkala':
                                            echo "Informasi Berkala";
                                            break;
                                        case 'sertamerta':
                                            echo "Informasi Serta Merta";
                                            break;
                                        case 'setiapsaat':
                                            echo "Informasi Setiap Saat";
                                            break;
                                        case 'dikecualikan':
                                            echo "Informasi Dikecualikan";
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>{{$p->judul}}</td>
                                <td>{{$p->deskripsi}}</td>
                                <td style="text-align: center">
                                    <a href="/berkas_ppid/{{$p->file}}"><h3><i class="icon icon-download-alt"></i></h3></a>
                                </td>
                                <td>
                                @if(Auth::user()->role == 'admin')
                                    <a href="{{route('ppid.edit',$p->id)}}"><button class="btn btn-warning btn-mini">Edit</button></a>
                                    <a href="{{route('ppid.delete',$p->id)}}"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                    <form action="{{route('ppid.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                            <tr>
                                <th>Tanggal Informasi</th>
                                <td>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
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
                                    <input type="text" name="judul" class="form-control" value="{{old('ket')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>
                                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{old('deksripsi')}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td>
                                    <input type="file" name="file" id="file" required>
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
<script>
    $('.select2').select2();
</script>
@endsection