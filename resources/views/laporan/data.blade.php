<table class="table table-striped" id="tbl-laporan" >
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Bug</th>
            <th>Deskripsi</th>
            <th>Tanggal Kejadian</th>
            <th>Pelapor</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($laporan as $lp)
         <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td>{{ $lp->jenis }}</td>
            <td>{{ $lp->deskripsi }}</td>
            <td>{{ $lp->tglkejadian }}</td>
            <td>{{ $lp->pelapor }}</td>
            <td>{{ $lp->status }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formLaporan"
                data-mode="edit"
                data-id="{{ $lp->id }}"
                data-jenis="{{ $lp->jenis }}"
                data-deskripsi="{{ $lp->deskripsi }}"
                data-tgl_kejadian="{{ $lp->tglkejadian }}"
                data-pelapor="{{ $lp->pelapor }}"
                data-status="{{ $lp->status }}"
                >
                    <i class="fas fa-edit"></i>
            </button>
            <form action="{{ url('laporan', $lp->id) }}" style="display:inline" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-secondary delete-data" type="submit"  title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            </td>
         </tr>
       @endforeach
</tbody>
</table>
<div class="d-flex">
    {{ $laporan->links() }}
</div>


<!-- dialog konfirmasi -->
<div class="modal fade" id="confirmLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  {{-- import --}}
  <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Laporan Bug</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="POST" action="{{ url(request()->segment(1).'/import') }}" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenis">File Excel</label>
                            <input type="file" name="import" id="import">
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
        </div>
        </div>
    </div>
</div>
</form>
