@extends('layout')
@section('content')
<div class="template p-2">
    <form action="{{ route('debtor.store') }}" method="post" >
        @csrf
        <div class="input">
            <input type="text" placeholder="Nama" required name="name">
        </div>
        <div class="input">
            <input type="number" placeholder="No Tlp" required name="telp">
        </div>
        <div class="divider"></div>
        <a href="javascript:history.go(-1)"class="button bg-red">Kembali</a>
        <button class="button">Tambah Pelanggan</button>
        <div>
            <a href="{{ route('debt.create') }}"class="button bg-dark">Sudah ada data pelanggan</a>
        </div>
    </form>
    
</div>
@endsection