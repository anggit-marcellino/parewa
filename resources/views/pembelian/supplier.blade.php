<div class="modal" id="modal-supplier" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel">Pilih Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="ion ion-md-close"></i>
                    </button>
   </div>
            
<div class="modal-body">
   <table class="table table-striped tabel-supplier">
      <thead>
         <tr>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($supplier as $data)
         <tr>
            <th>{{ $data->nama_supplier }}</th>
            <th>{{ $data->alamat }}</th>
            <th>{{ $data->no_hp }}</th>
            <th><a href="pembelian/{{ $data->kode_supplier }}/tambah" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>
      
         </div>
      </div>
   </div>
