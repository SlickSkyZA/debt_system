@extends('layout')
@section('content')
    <div class="container mt-3">
        <h3>Form User</h3>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="full_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="job">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
                <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Konfirmasi password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation">
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Photo</label>
              <div class="col-sm-10">
                <input type="file" class="form-contro" name="photo">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
              </div>
            </div>
        </form>
    </div>
@endsection