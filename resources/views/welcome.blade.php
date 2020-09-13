@extends('layout')
@section('content')
<div class="template">
    <div class="header">
        <a href="{{ route("debtor.create") }}" class="button">Tambah Pelanggan</a>
    </div>
    <div class="content">
        @foreach ($data as $item)
            <a href="{{ route("debt.show", $item->id) }}">
                <div class="item">
                    <div class="left">
                        <h2>{{ $item->name }}</h2>
                        <span>{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="right">
                        <h2>Rp. {{ number_format($item->total) }}</h2>
                        <span>{{ $item->descrip }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection