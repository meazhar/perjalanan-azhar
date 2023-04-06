@extends('layouts.index')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Laporan Bug</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-alert">
                {{ session('success') }}
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formLaporan">
                <i class="fas fa-plus-circle"> Tambah data</i>
            </button>


            <a href="{{ route('export-laporan') }}" class="btn btn-success">
                <i class="fa fa-file-excel"></i> Export
            </a>

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formImport">
                <i class="fas fa-file-excel"></i> Import
            </button>
                @include('laporan.data')
                @include('laporan.form')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@push('scripts')
<script>
    // $('#tbl-laporan').DataTable();

//automatically success classl
$("#success-alert").fadeTo(2000, 500).slideUp(500, function (){
    $("#success-alert").slideUp(500);
});

//delete
$('#remove').on('click', function () {
     const data = $(this).closest('tr').find('td:eq(1)').text()
     $('#data-delete').text(data)

     const form = $(this).closest('tr').find('form')
     $('#btn-confirm').on('click', function () {
         form.submit();
     })
 })

$('#formLaporan').on('show.bs.modal', function(e){
    console.log('modal')
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const jenis = btn.data('jenis')
            const deskripsi = btn.data('deskripsi')
            const tgl_kejadian = btn.data('tgl_kejadian')
            const pelapor = btn.data('pelapor')
            const status = btn.data('status')
            if(mode == 'edit'){
                console.log(mode)
                modal.find('.modal-title').text('Edit Data')
                modal.find('#jenis').val(jenis)
                modal.find('#deskripsi').val(deskripsi)
                modal.find('#tglkejadian').val(tgl_kejadian)
                modal.find('#pelapor').val(pelapor)
                modal.find('#status').val(status)
                modal.find('.modal-footer #btn-submit').text('Update')
                modal.find('#method').html('@method("PATCH")')
                modal.find('form').attr('action', `{{ url('laporan') }}/${id}`)
            }else{
                modal.find('.modal-title').text('Form laporan')
                modal.find('#jenis').val('')
                modal.find('#deskripsi').val('')
                modal.find('#tglKejadian').val('')
                modal.find('#pelapor').val('')
                modal.find('#status').val('')
                modal.find('.modal-footer btn-confirm').text('Submit')
                modal.find('.modal-body #method').html('')
            }
        })
</script>
@endpush
