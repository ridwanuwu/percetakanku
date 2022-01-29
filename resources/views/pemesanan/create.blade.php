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

<form action="{{ route('pesan.store') }}" method="post">
    @csrf
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Data Pemesanan</h5>
            <form class="">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label class="">ID Pemesanan</label><input name="ID_PEMESANAN" type="text" class="form-control" readonly  value="{{ $nomer }}"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label class="">Pelanggan</label>
                            <select name="NO_PELANGGAN" id="NO_PELANGGAN" class="form-control">
                                <option disabled>Pilih Pelanggan</option>
                                @foreach ($pelanggan as $item)
                                    <option value="{{ $item->NO_PELANGGAN }}">{{ $item->NO_PELANGGAN }} - {{ $item->NAMA_PELANGGAN }}</option>
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
                        <div class="position-relative form-group"><label class="">Tanggal Pemesanan *</label><input name="TANGGAL_PEMESANAN" type="date" class="form-control"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group"><label for="exampleSelect" class="">Metode Pembayaran *</label><select name="METODE_PEMBAYARAN" id="exampleSelect" class="form-control">
                            <option value="0">Bayar Tunai</option>
                            <option value="1">Transfer</option>
                        </select></div>
                    </div>
                </div>

                <div class="position-relative form-group"><label class="">Alamat Kirim</label><input type="address" name="ALAMAT_KIRIM" class="form-control"></div>
                
                

                {{-- <div class="position-relative form-group"><label class="">Tanggal Pemesanan</label><input type="date" name="TANGGAL_PEMESANAN" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleSelect" class="">Metode Pembayaran</label><select name="METODE_PEMBAYARAN" id="exampleSelect" class="form-control">
                    <option value="0">Bayar Tunai</option>
                    <option value="1">Transfer</option>
                </select></div> --}}
                
                <div class="position-relative form-group"><label class="">Keterangan</label><input name="KETERANGAN_PEMESANAN" type="text" class="form-control"></div>
                <h6>* (wajib)</h6>
                <div class="position-relative form-group"><input type="text" name="ID_PEGAWAI" value="PA-0" class="form-control" style="display:none;"></div>
                <div class="position-relative form-group"><input type="text" name="STATUS_PEMESANAN" value="0" class="form-control" style="display:none;"></div>
                <div class="position-relative form-group"><input type="text" name="DP_PEMESANAN" value="0" class="form-control" style="display:none;"></div>
                <div class="position-relative form-group"><input type="text" name="TOTAL_PEMESANAN" value="0" class="form-control" style="display:none;"></div>
                <button class="mt-1 btn btn-primary">Submit</button>
                <a href="{{ route('pesan.index') }}" class="btn btn-md btn-secondary">Back</a>
            </form>
        </div>
    </div>
</form>
@endsection