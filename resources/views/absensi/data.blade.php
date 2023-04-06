<div class="card-body">
    <table class="table table-compact table-bordered table-hover" id="tbl-absensi">
          <thead>
             <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Masuk</th>
                <th>Waktu Masuk</th>
                <th>Status</th>
                <th>Waktu Selesai Kerja</th>
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
            @foreach ($absensi as $abs)
             <tr>
               <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
               <td>{{ $abs->namaKaryawan }}</td>
               <td>{{ $abs->tanggalMasuk }}</td>
               <td>{{ $abs->waktuMasuk }}</td>
               <td>{{ $abs->status }}</td>
               <td>{{ $abs->waktuKeluar }}</td>
               <td>
                {{-- <button class="btn" type="button
                " style="color:green" title="Edit"
                    data-mode="edit"
                    data-id="{{ $abs->id }}"
                    data-namaKaryawan= "{{ $abs->namaKaryawan }}"
                    data-tanggalMasuk= "{{ $abs->tanggalMasuk }}"
                    data-waktuMasuk= "{{ $abs->waktuMasuk }}"
                    data-waktuKeluar= "{{ $abs->waktuKeluar }}">
                    <i class="fas fa-edit"></i>
                </button>
                 |
                <form action="absen">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="button" style="color:red" title="Delete">
                    <i class="fas fa-trash"></i>
                    </button> --}}

                    <button class="btn" type="button" style="color::green" modal-title="Edit" data-target="#formAbsensi" data-toggle="modal"
                    data-mode="edit"
                    data-id="{{ $abs->id }}"
                    data-nama_karyawan= "{{ $abs->namaKaryawan }}"
                    data-tanggal_masuk= "{{ $abs->tanggalMasuk }}"
                    data-waktu_masuk= "{{ $abs->waktuMasuk }}"
                    data-status= "{{ $abs->status }}"
                    data-waktu_keluar= "{{ $abs->waktuKeluar }}">
                    <i class="fas fa-edit"></i>
                    </button>
                    <form action="{{ route('absensi.destroy', $abs->id) }}" method="post" id="hapus">
                        @csrf
                        @method('DELETE')
                        <button class="btn remove" type="button" id="remove" data-target="ms" style="color::red" title="Delete">
                            <i class="fas fa-trash"></i>
                    </form>
                </form>
               </td>
             <tr>
            @endforeach
       </table>
</div>
<!-- dialog konfirmasi -->
<div class="modal fade" id="ms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            Apakah data <b id="data-delete"></b> akan dihapus?
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger" id="btn-confirm">Ya</button>
        </form>
        </div>
      </div>
    </div>
  </div>
