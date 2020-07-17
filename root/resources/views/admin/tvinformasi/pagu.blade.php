@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-money"></i> </span>
                <h5>Pagu & Realisasi Belanja</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Belanja Pegawai</th>
                        <th>Belanja Barang</th>
                        <th>Belanja Modal</th>
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
                            <a href="{{route('tvinformasi.pagu_edit',$p->id)}}"><button class="btn btn-warning btn-mini">Edit</button></a>
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
                                    <input type="date" name="tanggal" class="form-control" value="{{date('Y-m-j')}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Pegawai</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_pegawai" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Barang</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_barang" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_modal" placeholder="0.00" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="total" placeholder="0.00" class="span11" required>
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