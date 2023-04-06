<div class="card">
    <div class="card-header">
      <h3>Form</h3>
    </div>
    <div class="card-body">
      <form id="formCucian">
      <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label">No Transaksi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="id" placeholder="Id" name="id">
        </div>
      </div>
      <div class="form-group row">
        <label for="notelp" class="col-sm-4 col-form-label">Nomor Telpon</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="notelp" placeholder="notelp" name="notelp">
        </div>
      </div>
      <div class="form-group row">
        <label for="jenisCucian" class="col-sm-4 col-form-label">Jenis Cucian</label>
        <div class="col-sm-8">
        <select class="form-control" name="jenisCucian" id="jenisCucian" placeholder="Jenis Cucian">
          <option value="Standar">Standar</option>
          <option value="Ekspress">Express</option>
        </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="namaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan" name="namaPelanggan">
        </div>
      </div>
      <div class="form-group row">
        <label for="tgl_cuci" class="col-sm-4 col-form-label">Tanggal Cuci</label>
        <div class="col-sm-8">
          <input type="date" class="form-control" name="tgl_cuci" id="tgl_cuci">
        </div>
      </div>
      <div class="form-group row">
        <label for="berat" class="col-sm-4 col-form-label">Berat</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="berat" placeholder="berat" name="berat">
        </div>
      </div>
      <div class="form-group row">
        <label for="nama-produk" class="col-sm-4 col-form-label"></label>
        <div class="col-sm-2">
          <button class="form-control btn btn-primary" type="button" id="btnSimpan">Submit</button>
      </div>
      </form>
    </div>
  </div>
