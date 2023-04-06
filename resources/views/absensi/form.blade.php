  <!-- Modal -->
  <div class="modal fade" id="formAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="absensi">
                @csrf
                <div id="method"></div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="namaKaryawan" name="namaKaryawan">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk">
                  </div>
                </div>


                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                    <div class="col-sm-8">
                      <input type="time" class="form-control" id="waktuMasuk" name="waktuMasuk">
                    </div>
                  </div>



                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Selesai Kerja</label>
                    <div class="col-sm-8">
                      <input type="time" class="form-control" id="waktuKeluar" name="waktuKeluar">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                    <select name="status" id="status">
                        <option value="masuk">Masuk</option>
                        <option value="cuti">Cuti</option>
                        <option value="sakit">Sakit</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-submit">Save changes</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
