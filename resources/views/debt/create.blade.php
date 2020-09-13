@extends('layout')
@section('content')
<div class="template p-2">
    @if(Session::has('message'))
        <p class="alert text-red">{{ Session::get('message') }}</p>
    @endif
    <form action="{{ route('debt.store') }}" method="post" >
        @csrf
        <div class="input">
            <select name="user_id">
                @foreach ($debtor as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input">
            <input type="number" placeholder="Rp0" required name="total">
        </div>
        <div class="input">
            <input type="text" placeholder="Catatan transaksi" required name="descrip">
        </div>
        <div class="input">
            <input type="date" required name="due_date">
        </div>
        <div class="divider"></div>
        <a href="javascript:history.go(-1)"class="button bg-red">Kembali</a>
        <button class="button">Tambah Pelanggan</button>
    </form>
    
</div>
@endsection