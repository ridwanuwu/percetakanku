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

<form id="formD" name="formD" action="{{ route('detail.store') }}" method="post">
    @csrf
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Tambah Data Detail Pemesanan</h5>
            <form class="">
                {{-- <div class="position-relative form-group"><label class="">ID_PEMESANAN</label><input type="text" name="ID_PEMESANAN" class="form-control"></div> --}}
                <div class="position-relative form-group"><label class="">ID Detail</label><input type="text" name="ID_DETAIL_PESAN" class="form-control"></div>
                <div class="position-relative form-group"><label class="">ID Pemesanan</label><select name="ID_PEMESANAN" id="ID_PEMESANAN" class="form-control">
                    <option disabled>Pilih ID Pemesanan</option>
                    @foreach ($pesans as $item)
                        <option value="{{ $item->ID_PEMESANAN }}">{{ $item->ID_PEMESANAN }} - {{ $item->pelanggan->NAMA_PELANGGAN }}</option>
                    @endforeach
                </select></div>

                <div class="position-relative form-group">
                    <label class="">Menu Layanan</label>
                        <select name="ID_MENU" id="ID_MENU" class="form-control">
                            <option disabled>Pilih Menu</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->ID_MENU }}" data-menu="{{ $item->HARGA_MENU }}">{{ $item->NAMA_MENU }}</option>
                                @endforeach
                        </select>
                </div>

                <div class="position-relative form-group">
                    <label for="menu" class="">Harga Menu</label>
                        <input type="text" name="menu" class="form-control" readonly>
                </div>

                
                <div class="position-relative form-group"><label class="">QTY</label><input type="number" name="QTY" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" class="form-control"></div>
                <div class="position-relative form-group"><label class="">Jumlah halaman</label><input type="number" name="JUMLAHHALAMAN" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" class="form-control"></div>
                <div class="position-relative form-group"><label class="">Desain</label><input name="DESAIN" type="file" class="form-control"></div>


                <div class="position-relative form-group">
                    <label class="">Harga Bayar</label>
                        <input type="text" name="HARGABAYAR" class="form-control" readonly>
                </div>
                <div class="position-relative form-group"><label class="">Keterangan</label><input type="text" name="KETERANGANDETAIL" class="form-control" ></div>
                <button class="mt-1 btn btn-primary">Submit</button>
                <a href="{{ route('pesan.index') }}" class="btn btn-md btn-secondary">Back</a> 
            </form>
        </div>
    </div>
</form>
@endsection

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