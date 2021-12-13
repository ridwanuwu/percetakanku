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
                <div class="position-relative form-group"><label class="">ID Pemesanan</label><select name="ID_PEMESANAN" id="ID_PEMESANAN" class="form-control">
                    <option disabled>Pilih ID Pemesanan</option>
                    @foreach ($pesans as $item)
                        <option value="{{ $item->ID_PEMESANAN }}">{{ $item->ID_PEMESANAN }} - {{ $item->pelanggan->NAMA_PELANGGAN }}</option>
                    @endforeach
                </select></div>

                <div class="position-relative form-group">
                    <label class="">Menu Layanan</label>
                        <select name="ID_MENU" id="ID_MENU" onchange="price()" class="form-control">
                            <option disabled>Pilih Menu</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->ID_MENU }}" data-menu="{{ $item->HARGA_MENU }}">{{ $item->NAMA_MENU }} - Rp{{ $item->HARGA_MENU }}</option>
                                @endforeach
                        </select>
                </div>

                <div class="position-relative form-group"><label class="">ID detail</label><input type="text" name="ID_DETAIL_PESAN" class="form-control"></div>
                <div class="position-relative form-group"><label class="">QTY</label><input type="number" name="QTY" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" class="form-control"></div>
                <div class="position-relative form-group"><label class="">Jumlah halaman</label><input type="number" name="JUMLAHHALAMAN" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" class="form-control"></div>
                <div class="position-relative form-group"><label class="">Desain</label><input name="DESAIN" type="file" class="form-control"></div>



                
                <div class="position-relative form-group">
                    <label for="hargamenu" class="">Harga Menu</label>
                        <input type="text" name="hargamenu" id="hargamenu" class="form-control" readonly>
                </div>
                




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


<form>
    <select name="package" id="package">
        <option data-price="100000" data-discount="10">Paket 1</option>
        <option data-price="150000" data-discount="10">Paket 2</option>
        <option data-price="200000" data-discount="10">Paket 3</option>
    </select>

    <div>
        <label for="price">Harga</label>
        <input type="text" name="price" readonly />
        <br>
        <label for="price">Discount</label>
        <input type="text" name="discount" readonly />
        <br>
        <h4>Total: <span id="total">0</span></h4>
    </div>

</form>
@endsection

@section('script')
<script type="text/javascript">
    $('#package').on('change', function(){
  // ambil data dari elemen option yang dipilih
  const price = $('#package option:selected').data('price');
  const discount = $('#package option:selected').data('discount');
  
  // kalkulasi total harga
  const totalDiscount = (price * discount/100)
  const total = price - totalDiscount;
  
  // tampilkan data ke element
  $('[name=price]').val(price);
  $('[name=discount]').val(totalDiscount);
  
  $('#total').text(`Rp ${total}`);
});
</script>



    <script type="text/javascript">
        function price() {
            var harga = document.getElementById("ID_MENU").value;
            document.getElementById("hargamenu").value=harga
            
        }
    </script>


    {{-- <script type="text/javascript">
        $('#ID_MENU').on('change', function(){
        // ambil data dari elemen option yang dipilih
        const hargamenu = $('#ID_MENU option:selected').data('hargamenu');
        
        // tampilkan data ke element
        $('[name=hargamenu]').val(hargamenu);

        });
    </script> --}}

    <script type="text/javascript" language="Javascript">
    qty = document.formD.QTY.value;
    document.formD.HARGABAYAR.value = qty;
    jumlah = document.formD.JUMLAHHALAMAN.value;
    document.formD.HARGABAYAR.value = jumlah;

    function OnChange(value){
      qty = document.formD.QTY.value;
      jumlah = document.formD.JUMLAHHALAMAN.value;
      total = qty * jumlah;
      document.formD.HARGABAYAR.value = total;
    }

    menu = document.formD.ID_MENU.value;
    document.formD.hargamenu.value = menu;
  </script>

  
@endsection