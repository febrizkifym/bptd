@extends('layouts/admin')

@section('content')
    <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5>User</h5>
              </div>
              <div class="widget-content nopadding">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($user as $u)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$u['firstname'].' '.$u['lastname']}}</td>
                            <td>{{$u['email']}}</td>
                            <td>{{$u['username']}}</td>
                            <td>{{$u['role']}}</td>
                            <td>
                                <a href="{{route('user.edit',$u['id'])}}"><button class="btn btn-info">Edit</button></a>
                                <a href="{{route('user.delete',$u['id'])}}"><button class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
    <div class="row-fluid">
        <div class="span12">
            <a href="{{route('user.add')}}"><button class="btn btn-success">Tambah</button></a>
        </div>
    </div>
@endsection