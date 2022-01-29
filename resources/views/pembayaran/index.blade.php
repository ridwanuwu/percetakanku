@extends('template.master')

@section('content')
<a href="{{ route('bayar.create') }}" class="mb-2 mr-2 btn btn-primary">Tambah Data</a>
    
<div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">Tabel Pembayaran</h5>
        <table class="mb-0 table table-hover">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Pemesanan</th>
                    <th>ID Pegawai</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Status</th>
                    {{-- <th>Bukti</th> --}}
                    <th>No Rekening</th>
                    {{-- <th>Pegawai</th> --}}
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bayars as $bayar)
                    <tr>
                        <td>{{ $bayar->ID_PEMBAYARAN }}</td>
                        {{-- <td>{{ $bayar->pegawai->NAMA_PEGAWAI }}</td> --}}
                        <td>{{ $bayar->pemesanan->ID_PEMESANAN }}</td>
                        <td>{{ $bayar->ID_PEGAWAI }}</td>
                        {{-- @if ($bayar->METODE_PEMBAYARAN == 1)
                            <td>Bayar Tunai</td>
                        @else
                            <td>Transfer</td>
                        @endif --}}
                        {{-- <td>{{ $bayar->METODE_PEMBAYARAN }}</td> --}}
                        <td>{{ $bayar->TANGGAL_PEMBAYARAN }}</td>
                        
                        @if ($bayar->STATUS_BAYAR == 0)
                            <td><div class="badge badge-danger">Belum</div></td>
                        @else
                            <td><div class="badge badge-info">Sudah</div></td>
                        @endif
                        {{-- <td>{{ $bayar->BUKTI_BAYAR }}</td> --}}
                        <td>{{ $bayar->NO_REKENING }}</td>
                        {{-- <td>{{ $bayar->STATUS_Pembayaran }}</td> --}}
                        {{-- <td class="text-center">
                            <a href="{{ route('bayar.terima') }}" class="btn btn-success">Terima</a>
                            
                        @if ($bayar->STATUS_BAYAR == 0)
                            <a href="{{ route('bayar.hapus') }}" class="btn btn-success">Hapus</a>
                        @else
                            <a class="btn btn-secondary disabled">Hapus</a>
                        @endif
                        
                        </td> --}}
                        <td>
                            @if($bayar->STATUS_BAYAR == 1)
                                <a href="{{ url('admin/bayar/status/'.$bayar->ID_PEMBAYARAN) }}" class="btn btn-secondary disabled">Bayar</a>
                            @else
                                <a href="{{ url('admin/bayar/status/'.$bayar->ID_PEMBAYARAN) }}" class="btn btn-success">Bayar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection

@section('script')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
 
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            location.reload();
        })
 
        $('body').on('click','.btn-hapus',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#modal-notification').find('form').attr('action',url);
 
            $('#modal-notification').modal();
        })
 
    })
</script>
 
@endsection