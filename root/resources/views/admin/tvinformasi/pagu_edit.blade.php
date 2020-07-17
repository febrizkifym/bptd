@extends('layouts/admin')

@section('content') 
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><h5>Edit Data</h5></div>
                <div class="widget-content">
                    <form action="{{route('tvinformasi.pagu_update',$p->id)}}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <input type="date" name="tanggal" class="form-control" value="{{$p->tanggal}}" required> 
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Pegawai</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_pegawai" placeholder="0.00" value="{{$p->belanja_pegawai}}" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Barang</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_barang" placeholder="0.00" value="{{$p->belanja_barang}}" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="belanja_modal" placeholder="0.00" value="{{$p->belanja_modal}}" class="span11" required>
                                        <span class="add-on">%</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <div class="input-append">
                                        <input type="text" name="total" placeholder="0.00" value="{{$p->total}}" class="span11" required>
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