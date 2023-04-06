<div class="modal fade" id="formLaporan" tabindex="-1" role="dialog" aria-labelledby="formLaporan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="post" action="laporan">
                @csrf
                <div id="method"></div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-4 col-form-label">Jenis Bug</label>
                    <div class="col-sm-8">
                    <select name="jenis" id="jenis">
                        <option value="functional_error">Functional Error</option>
                        <option value="performancedefects">Performance Defects</option>
                        <option value="usabilitydefects">Usabilitity Defects</option>
                        <option value="compatibilityerror">Compatibility Error</option>
                        <option value="securityerror">Security Error</option>
                        <option value="syntaxerror">Syntax Error</option>
                        <option value="logicerror">Logic Error
                        </option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="tglkejadian" class="col-sm-4 col-form-label">Tanggal Kejadian</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" id="tglkejadian" name="tglkejadian">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pelapor" class="col-sm-4 col-form-label">Nama Pelapor</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="pelapor" name="pelapor">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Status Bug</label>
                    <div class="col-sm-8">
                    <select name="status" id="status">
                        <option value="reported">Reported</option>
                        <option value="onprogress">On progress</option>
                        <option value="solved">Solved</option>
                    </select>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-submit">Save changes</button>
            </form>
        {{-- </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
    </div>
</div>
