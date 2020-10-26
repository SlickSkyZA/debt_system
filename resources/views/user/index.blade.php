@extends('layout')
@section('content')
    <div class="container">

        <div class="alert alert-dark mt-3" role="alert">
            Home / <a href="">User</a>
        </div>
        <h3>UTS - Tabel Rekaman User</h3>
        <a href="{{ route('users.create') }}" class="btn btn-success">Tambah</a>
        <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            <img src="{{ asset($item->photo) }}" class="img-fluid rounded-circle" width="100">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->job }}</td>
                        <td>
                            <div class="row">
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="mr-1">
                                    @method("DELETE")
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-success btn-sm ">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>    
@endsection