@extends('layout')
@section('content')
<div class="template">
    <div class="header">
        <a href="/" class="button bg-dark">Home</a>
        <a href="{{ route("debt.give", $id) }}" class="button bg-red">Berikan</a>
        <a href="{{ route("debt.accept", $id) }}" class="button">Terima</a>
    </div>
    <div class="content">
        @if (count($data))
            @foreach ($data as $item)
                <div class="item">
                    <div class="left">
                        <span>{{ $item->created_at->format('d M Y') }}</span><br>
                        <span>{{ $item->descrip }}</span>
                    </div>
                    <div class="right">
                        <h2>Rp. {{ number_format($item->total) }}</h2>
                        <span class="{{ ($item->status == 'Uang Keluar')? 'gived': 'accepted' }}">{{ $item->status }}</span>    
                    </div>
                </div>
            @endforeach
        @endif
        <div class="item">
            <div class="left">
                <span>{{ $debt->created_at->format('d M Y') }}</span><br>
                <span><b>{{ $debt->descrip }}</b></span>
            </div>
            <div class="right">
                <h2>Rp. {{ number_format($debt->total) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection