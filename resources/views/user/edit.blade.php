@extends('layout')
@section('content')
    <div class="container mt-3">
        <h3>Form Edit User</h3>
        <form action="{{ route('users.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $data->name }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="full_name" value="{{ $data->full_name }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="{{ $data->email }}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="job" value="{{ $data->job }}">
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <img src="{{ asset($data->photo) }}" class="img-fluid rounded" width="100">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-custom" name="photo">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
        <form action="{{ route('users.resetpassword', $data->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password">
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Konfirmasi password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="    ">
                </div>
              </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                   <button type="submit" class="btn btn-primary">Ubah Password</button>
                   <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection