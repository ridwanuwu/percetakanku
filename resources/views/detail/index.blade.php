@extends('template.master')

@section('content')
<a href="{{ route('detail.create') }}" class="mb-2 mr-2 btn btn-primary">Tambah Data</a>
    
<div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">Tabel Pemesanan</h5>
        <table class="mb-0 table table-hover">
            <thead>
                <tr>
                    <th>ID Detail</th>
                    <th>ID Pemesanan</th>
                    <th>Menu</th>
                    
                    <th>QTY</th>
                    <th>Jumlah Halaman</th>
                    <th>Desain</th>
                    <th>Harga Bayar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail->ID_DETAIL_PESAN }}</td>
                        <td>{{ $detail->ID_PEMESANAN }}</td>
                        <td>{{ $detail->menu_layanan->NAMA_MENU }}</td>
                        <td>{{ $detail->QTY }}</td>
                        <td>{{ $detail->JUMLAHHALAMAN }}</td>
                        <td><img width="150px" src="{{ $detail->DESAIN }}"/></td>
                        <td>{{ $detail->HARGABAYAR }}</td>
                        <td>{{ $detail->KETERANGANDETAIL }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection