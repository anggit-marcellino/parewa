@extends('layouts.main')
@extends('layouts.menuatas')
@extends('layouts.menusamping')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <a onclick="addForm()" class="btn btn-success" style="color: black;"><i class="fa fa-plus-circle"></i> Transaksi Baru</a>
        @if(!empty(session('idpembelian')))
        <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info"><i class="fa fa-plus-circle"></i> Transaksi Aktif</a>
        @endif
      </div>
      <div class="card-body">
<table class="table table-striped tabel-pembelian">
<thead>
   <tr>
      <th width="30">No</th>
      <th>Tanggal</th>
      <th>Supplier</th>
      <th>Total Harga</th>
      <th>Diskon</th>
      <th>Total Bayar</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>

@include('pembelian.detail')
@include('pembelian.supplier')
@endsection

@section('js')
<script src="/assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
var table, save_method, table1;
$(function(){
   table = $('.tabel-pembelian').DataTable({
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "{{ route('pembelian.data') }}",
       "type" : "GET"
     }
   }); 
   
   table1 = $('.tabel-detail').DataTable({
     "dom" : 'Brt',
     "bSort" : false,
     "processing" : true
    });

   $('.tabel-supplier').DataTable();
});

function addForm(){
   $('#modal-supplier').modal('show');        
}

function showDetail(id){
    $('#modal-detail').modal('show');

    table1.ajax.url("pembelian/"+id+"/lihat");
    table1.ajax.reload();
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "pembelian/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}
</script>
@endsection