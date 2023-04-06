@extends('layouts.index')
@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>ABSENSI KERJA</b></h3>

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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formAbsensi">
    Tambah Data
    </button>

    @include('absensi.form')
    @include('absensi.data')
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
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
 $('#tbl-absensi').DataTable();

//automatically success classl
$("#success-alert").fadeTo(2000, 500).slideUp(500, function (){
    $("#success-alert").slideUp(500);
});

// Modal Form Input
// $('#formAbsensi').on('show.bs.modal', function(e){
// const btn = $(e.relatedTarget)
// const modal = $(this)
// const id = btn.data('id')
// const namaKaryawan = btn.data('namaKaryawan')
// const waktuMasuk = btn.data('waktuMasuk')
// const status = btn.data('status')
// const waktuKeluar = btn.data('waktuKeluar')
// if(mode === "edit")
// {
//     modal.find('.modal-title').text("Edit Data Absensi")
//     modal.find('modal-body #namaKaryawan').val(namaKaryawan)
//     modal.find('modal-body #waktuMasuk').val(waktuMasuk)
//     modal.find(`modal-body #status option`).removeAttr('selected','selected')
//     modal.find(`modal-body #status option[value='${status}']`).attr('selected','selected')
//     modal.find('modal-body #waktuKeluar').val(waktuKeluar)
//     modal.find('#method').html('@method("PATCH")')
//     modal.find('form').attr('action', `{{ url('absensi') }}/${id}`)
// }else{
//     modal.find('.modal-title').text("Input Data Absensi")
//     modal.find('.modal-body #namaKaryawan').val('')
//     modal.find('.modal-body #waktuMasuk').val('')
//     modal.find(`modal-body #status option`).removeAttr('selected','selected')
//     modal.find('.modal-body #waktuKeluar').val('')
//     modal.find('.modal-footer #btn-submit').text('Submit')
//     modal.find('.modal-body #method').html('')
//     modal.find('form').attr('action', '{{ url("absensi") }}')
//      }
//      $('#formAbsensi').on('shown.bs.modal',function(){
//          $('#nama').delay(1000).focus().select()
//      })
// })


 //update or input

 $('#modalFormSpp').on('show.bs.modal',function(e){
const btn = $(e.relatedTarget)
const modal = $(this)
const id = btn.data('id')
const nama_karyawan = btn.data('nama_karyawan')
const tanggal_masuk= btn.data('tanggal_masuk')
const waktu_masuk= btn.data('waktu_masuk')
const status = btn.data('status')
const waktu_keluar = btn.data('waktu_keluar')
const mode = btn.data('mode')
     if(mode == 'edit'){
         modal.find('.modal-title').text('Apakah Data Ingin di Edit?')
         modal.find('#method').html('@method("PATCH")')
         modal.find('#namaKaryawan').val(nama_karyawan)
         modal.find('#tanggalMasuk').val(tanggal_masuk)
         modal.find('#waktuMasuk').val(waktu_masuk)
         modal.find('#status').val(status)
         modal.find('#waktuKeluar').val(waktu_keluar)
        modal.find('form').attr('action', '{{ url("absensi") }}/+id')
        moda.find('#method').html('{{ method_field("PATCH") }}')
        }else{
         modal.find('.modal-title').text('tambah absensi')
         modal.find('#namaKaryawan').val('')
        //  modal.find('#tanggalMasuk').val('')
         modal.find('#waktuMasuk').val('')
         modal.find('#status').val('')
         modal.find('#waktuKeluar').val('')
         modal.find('#btn-submit').val('')
         modal.find('#method').html('')
     }

     $('#formAbsensi').on('shown.bs.modal',function(){
         $('#nama').delay(1000).focus().select()
     })

 })
</script>
@endpush
