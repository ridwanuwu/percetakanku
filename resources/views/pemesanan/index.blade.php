@extends('template.master')


@section('total')
    {{ $jmlpesan }}
@endsection

@section('totalpelanggan')
    {{ $jmlpelanggan }}
@endsection

@section('selesai')
    {{ $selesai }}
@endsection

@section('content')
<a href="{{ route('pesan.create') }}" class="mb-2 mr-2 btn btn-primary">Tambah Data</a>
    
<div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">Tabel Pemesanan</h5>
        <table class="mb-0 table table-hover">
            <thead>
                <tr>
                    <th>ID Pemesanan</th>
                    {{-- <th>Pegawai</th> --}}
                    <th>Pelanggan</th>
                    <th>Metode Pembayaran</th>
                    <th>DP Pemesanan</th>
                    <th>Total Pemesanan</th>
                    <th>Status</th>
                    <th class="text-center">Detail Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesans as $pesan)
                    <tr>
                        <td>{{ $pesan->ID_PEMESANAN }}</td>
                        {{-- <td>{{ $pesan->pegawai->NAMA_PEGAWAI }}</td> --}}
                        <td>{{ $pesan->pelanggan->NAMA_PELANGGAN }}</td>
                        @if ($pesan->METODE_PEMBAYARAN == 1)
                            <td>Bayar Tunai</td>
                        @else
                            <td>Transfer</td>
                        @endif
                        {{-- <td>{{ $pesan->METODE_PEMBAYARAN }}</td> --}}
                        <td>{{ $pesan->DP_PEMESANAN }}</td>
                        <td>{{ $pesan->TOTAL_PEMESANAN }}</td>
                        @if ($pesan->STATUS_PEMESANAN == 0)
                            <td><div class="badge badge-danger">On Hold</div></td>
                        @else
                            <td><div class="badge badge-info">Accepted</div></td>
                        @endif
                        {{-- <td>{{ $pesan->STATUS_PEMESANAN }}</td> --}}
                        
                        <td class="text-center">
                            {{-- <td><a class="btn btn-outline-success" href="{{url('pesan/print/'. $pesan->ID_PEMESANAN)}}">EXPORT PDF</a></td> --}}
                            {{-- <a href="{{ url('print-pdf/stream/') }}" class="btn btn-danger">Print</a> --}}
                            {{-- <a href="{{ route('pesan.pdf') }}?id={{$pesan->ID_PEMESANAN}}" class="btn btn-success">Print</a> --}}
                            <a href="{{ route('detailadmin.index') }}" class="btn btn-success">Lihat</a>
                        @if ($pesan->STATUS_PEMESANAN == 0)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Detail
                        </button>
                        @else
                        <button type="button" class="btn btn-secondary disabled">
                            Tambah Detail
                        </button>
                        @endif
                        
                        </td>

                        <td>
                            @if($pesan->STATUS_PEMESANAN == 1)
                                <a href="{{ url('admin/pesan/status/'.$pesan->ID_PEMESANAN) }}" class="btn btn-secondary disabled">Terima</a>
                            @else
                                <a href="{{ url('admin/pesan/status/'.$pesan->ID_PEMESANAN) }}" class="btn btn-success">Terima</a>
                            @endif
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        <br>
        Current Page: {{ $pesans->currentPage() }}<br>
        Jumlah Data: {{ $pesans->total() }}<br>
        Data perhalaman: {{ $pesans->perPage() }}<br>
        <br>
        {{ $pesans->links() }}
    </div>
</div>



@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Detail Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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

                <form id="formD" name="formD" action="{{ route('detailadmin.store') }}" method="post">
                    @csrf
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Tambah Data Detail Pemesanan</h5> --}}
                            <form class="">
                                {{-- <div class="position-relative form-group"><label class="">ID_PEMESANAN</label><input type="text" name="ID_PEMESANAN" class="form-control"></div> --}}
                                <div class="position-relative form-group"><label class="">ID Detail</label><input
                                        type="text" name="ID_DETAIL_PESAN" class="form-control" value="{{ $nomerdet }}" readonly></div>
                                <div class="position-relative form-group"><label class="">ID Pemesanan</label><select
                                        name="ID_PEMESANAN" id="ID_PEMESANAN" class="form-control">
                                        <option disabled>Pilih ID Pemesanan</option>
                                        @foreach ($pesans as $item)@if ($item->STATUS_PEMESANAN == 0)
                                        <option value="{{ $item->ID_PEMESANAN }}">{{ $item->ID_PEMESANAN }} -
                                            {{ $item->pelanggan->NAMA_PELANGGAN }}</option>
                                        @endif
                                        @endforeach
                                    </select></div>
                                
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label class="">Menu Layanan *</label>
                                            <select name="ID_MENU" id="ID_MENU" class="form-control">
                                                <option disabled>Pilih Menu</option>
                                                @foreach ($menu as $item)
                                                <option value="{{ $item->ID_MENU }}" data-menu="{{ $item->HARGA_MENU }}">
                                                    {{ $item->NAMA_MENU }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="menu" class="">Harga Menu</label>
                                            <input type="text" name="menu" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label class="">QTY *</label><input
                                                type="number" name="QTY" onkeyup="OnChange(this.value)"
                                                onKeyPress="return isNumberKey(event)" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label class="">Jml Halaman *</label><input
                                                type="number" name="JUMLAHHALAMAN" onkeyup="OnChange(this.value)"
                                                onKeyPress="return isNumberKey(event)" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label class="">Harga Bayar</label>
                                            <input type="text" name="HARGABAYAR" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="position-relative form-group"><label class="">Desain *</label><input
                                            name="DESAIN" type="file" class="form-control"></div>
                                

                                
                                <div class="position-relative form-group"><label class="">Keterangan</label><input
                                        type="text" name="KETERANGANDETAIL" class="form-control"></div>
                                <h6>* (wajib)</h6>
                                        <button class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

@section('script')

    <script type="text/javascript">
    $('#ID_MENU').on('change', function(){
    // ambil data dari elemen option yang dipilih
    const menu = $('#ID_MENU option:selected').data('menu');

    // tampilkan data ke element
    $('[name=menu]').val(menu);
    });
    </script>

    <script type="text/javascript" language="Javascript">
    menu = document.formD.menu.value;
    document.formD.HARGABAYAR.value = menu;
    qty = document.formD.QTY.value;
    document.formD.HARGABAYAR.value = qty;
    jumlah = document.formD.JUMLAHHALAMAN.value;
    document.formD.HARGABAYAR.value = jumlah;

    function OnChange(value){
    //   var harga = hargam.getAttribute('data-menu');
      menu = document.formD.menu.value;
      qty = document.formD.QTY.value;
      jumlah = document.formD.JUMLAHHALAMAN.value;
      total = menu* qty * jumlah;
      document.formD.HARGABAYAR.value = total;
    }
  </script>

  
@endsection