@extends('layouts/admin')

@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <h5>Tambah Data</h5>
            </div>
            <div class="widget-content">
               <form action="{{route('user.update',$u->id)}}" method="post">
                   @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Depan</th>
                        <td>
                            <input type="text" name="firstname" class="form-control" value="{{$u->firstname}}" required>
                            @if($errors->has('firstname'))
                            <div class="alert alert-error">
                                {{$errors->first('firstname')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Belakang</th>
                        <td>
                            <input type="text" name="lastname" class="form-control" value="{{$u->lastname}}" required>
                            @if($errors->has('lastname'))
                            <div class="alert alert-error">
                                {{$errors->first('lastname')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>
                            <input type="text" name="username" class="form-control" value="{{$u->username}}" required>
                            @if($errors->has('username'))
                            <div class="alert alert-error">
                                {{$errors->first('username')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" class="form-control" value="{{$u->email}}" required>
                            @if($errors->has('email'))
                            <div class="alert alert-error">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Pasword</th>
                        <td>
                            <input type="password" name="password" class="form-control" value="" placeholder="Kosongkan jika tidak ingin mengganti sandi">
                            @if($errors->has('password'))
                            <div class="alert alert-error">
                                {{$errors->first('password')}}
                            </div>
                            @endif
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