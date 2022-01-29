@extends('template.master')


{{-- @section('total')
    {{ $bahan }}
@endsection

@section('totalpelanggan')
    {{ $jmlpelanggan }}
@endsection

@section('selesai')
    {{ $selesai }}
@endsection --}}

@section('content')
{{-- <a href="{{ route('pesan.create') }}" class="mb-2 mr-2 btn btn-primary">Tambah Data</a> --}}
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Data
</button>
<br>
<br>


<div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">Tabel Ukuran</h5>
        <table class="mb-0 table table-hover">
            <thead>
                <tr>
                    <th>ID ukuran</th>
                    <th>Nama ukuran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ukurans as $ukuran)
                    <tr>
                        <td>{{ $ukuran->ID_UKURAN }}</td>
                        <td>{{ $ukuran->UKURAN }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        {{-- <br>
        Current Page: {{ $bahans->currentPage() }}<br>
        Jumlah Data: {{ $bahans->total() }}<br>
        Data perhalaman: {{ $bahans->perPage() }}<br>
        <br>
        {{ $bahans->links() }} --}}
    </div>
</div>



@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ukuran</h5>
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

                <form id="formD" name="formD" action="{{ route('detail.store') }}" method="post">
                    @csrf
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Tambah Data Detail Pemesanan</h5> --}}
                            <form class="">
                                {{-- <div class="position-relative form-group"><label class="">ID_PEMESANAN</label><input type="text" name="ID_PEMESANAN" class="form-control"></div> --}}
                                <div class="position-relative form-group"><label class="">ID Bahan</label><input
                                        type="text" name="ID_BAHAN" class="form-control"></div>
                                <div class="position-relative form-group"><label class="">Nama Bahan</label><input
                                        type="text" name="NAMA_BAHAN" class="form-control"></div>
                                
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