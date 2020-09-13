@extends('layout')
@section('content')
<div class="template p-2">
    @if(Session::has('message'))
        <p class="alert text-red">{{ Session::get('message') }}</p>
    @endif
    <form action="{{ route('debt-detail.store') }}" method="post" >
        @csrf
        <div class="input">
            <input type="hidden" value="{{ $id }}" required name="debt_id">
            <input type="hidden" value="Uang Masuk" required name="status">
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
        <button class="button">Terima</button>
    </form>
    
</div>
@endsection