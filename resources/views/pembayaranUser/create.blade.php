@extends('template.master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bayarUser.store') }}" method="post">
    @csrf
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Data Pembayaran</h5>
            <form class="">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label class="">ID Pembayaran</label><input name="ID_PEMBAYARAN" type="text" class="form-control" readonly  value="{{ $nomer }}"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label class="">ID Pemesanan</label>
                            <select name="ID_PEMESANAN" id="ID_PEMESANAN" class="form-control">
                                <option disabled>Pilih Pemesanan</option>
                                @foreach ($pesans as $item)
                                @if ($item->BAYAR == null && $item->STATUS_PEMESANAN == 1)
                                    <option value="{{ $item->ID_PEMESANAN }}">{{ $item->ID_PEMESANAN }}</option>
                                @endif
                                    
                                @endforeach
                            </select></div>
                    </div>
                </div>
                {{-- <div class="position-relative form-group"><label class="">ID Pemesanan</label><input type="text" name="ID_PEMESANAN" class="form-control" readonly  value="{{ $nomer }}"></div>
                <div class="position-relative form-group"><label class="">No. Pelanggan</label>
                    <select name="NO_PELANGGAN" id="NO_PELANGGAN" class="form-control">
                        <option disabled>Pilih Pelanggan</option>
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->NO_PELANGGAN }}">{{ $item->NO_PELANGGAN }} - {{ $item->NAMA_PELANGGAN }}</option>
                        @endforeach
                    </select></div> --}}
                
                {{-- <div class="position-relative form-group"><label class="">ID Pegawai</label>
                    <select name="ID_PEGAWAI" id="ID_PEGAWAI" class="form-control">
                        <option disabled>Pilih Pegawai</option>
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->ID_PEGAWAI }}">{{ $item->ID_PEGAWAI }} - {{ $item->NAMA_PEGAWAI }}</option>
                        @endforeach
                    </select></div> --}}

                
                

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label class="">Tanggal Pembayaran</label><input name="TANGGAL_PEMBAYARAN" type="date" class="form-control"></div>
                    </div>
                    <div class="col-md-6">
                    <div class="position-relative form-group"><label class="">Bukti</label><input
                        name="DESAIN" type="file" class="form-control"></div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="position-relative form-group"><label for="exampleSelect" class="">Metode Pembayaran</label><select name="METODE_PEMBAYARAN" id="exampleSelect" class="form-control">
                            <option value="0">Bayar Tunai</option>
                            <option value="1">Transfer</option>
                        </select></div>
                    </div> --}}
                </div>

                {{-- <div class="position-relative form-group"><label class="">Alamat Kirim</label><input type="address" name="ALAMAT_KIRIM" class="form-control"></div> --}}
                

                {{-- <div class="position-relative form-group"><label class="">Tanggal Pemesanan</label><input type="date" name="TANGGAL_PEMESANAN" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleSelect" class="">Metode Pembayaran</label><select name="METODE_PEMBAYARAN" id="exampleSelect" class="form-control">
                    <option value="0">Bayar Tunai</option>
                    <option value="1">Transfer</option>
                </select></div> --}}
                <div class="position-relative form-group"><label class="">No Rekening</label><input name="NO_REKENING" type="text" class="form-control"></div>
                <div class="position-relative form-group"><input type="text" name="ID_PEGAWAI" value="PA-0" class="form-control" style="display:none;"></div>
                <div class="position-relative form-group"><input type="text" name="STATUS_BAYAR" value="0" class="form-control" style="display:none;"></div>
                <button class="mt-1 btn btn-primary">Submit</button>
                <a href="{{ route('bayarUser.index') }}" class="btn btn-md btn-secondary">Back</a>
            </form>
        </div>
    </div>
</form>
@endsection