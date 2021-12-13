@extends('template.master')

@section('content')
<a href="{{ route('pesan.create') }}" class="mb-2 mr-2 btn btn-primary">Tambah Data</a>
    
<div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">Tabel Pemesanan</h5>
        <table class="mb-0 table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pegawai</th>
                    <th>Pelanggan</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesans as $pesan)
                    <tr>
                        <td>{{ $pesan->ID_PEMESANAN }}</td>
                        <td>{{ $pesan->pegawai->NAMA_PEGAWAI }}</td>
                        <td>{{ $pesan->pelanggan->NAMA_PELANGGAN }}</td>
                        @if ($pesan->METODE_PEMBAYARAN == 1)
                            <td>Bayar Tunai</td>
                        @else
                            <td>Transfer</td>
                        @endif
                        {{-- <td>{{ $pesan->METODE_PEMBAYARAN }}</td> --}}
                        @if ($pesan->STATUS_PEMESANAN == 1)
                            <td>Dibayar</td>
                        @else
                            <td>Belum dibayar</td>
                        @endif
                        {{-- <td>{{ $pesan->STATUS_PEMESANAN }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection