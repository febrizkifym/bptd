@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                <h5>Pagu dan Realisasi</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pegawai</th>
                        <th>Barang</th>
                        <th>Modal</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no=1;
                      ?>
                      @foreach($pagu as $p)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$p->tanggal}}</td>
                          <td>{{$p->belanja_pegawai}}%</td>
                          <td>{{$p->belanja_barang}}%</td>
                          <td>{{$p->belanja_modal}}%</td>
                          <td>{{$p->total}}%</td>
                          <td>
                            <a href="{{route('tvinformasi.pagu_delete',$p->id)}}"><button class="btn btn-danger btn-mini">Hapus</button></a>
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
                <div class="widget-title"><h5>Tambah Data</h5></div>
                <div class="widget-content">
                    <form action="{{route('tvinformasi.pagu_post')}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" value="{{old('tanggal')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Pegawai</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" placeholder="0.00" class="span11" name="belanja_pegawai" value="{{old('belanja_pegawai')}}" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Barang</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" placeholder="0.00" class="span11" name="belanja_barang" value="{{old('belanja_barang')}}" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" placeholder="0.00" class="span11" name="belanja_modal" value="{{old('belanja_modal')}}" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" placeholder="0.00" class="span11" name="total" value="{{old('total')}}" required>
                                        <span class="add-on">%</span>
                                    </div>
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