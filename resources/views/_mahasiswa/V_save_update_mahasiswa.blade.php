<div class="modal fade" id="modal_SaveUpdate" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" id="form_SaveUpdate">
          <input class="form-control" type="hidden" name="id-key" readonly="readonly">
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">NIM <span class="text-danger">*</span></label>
            <div class="col-8">
              <input type="text" class="form-control shadow-none" name="no-induk-mhs" maxlength="20">
              <small class="form-text text-danger"></small>
            </div>
					</div>
					<div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Nama Depan <span class="text-danger">*</span></label>
            <div class="col-8">
              <input type="text" class="form-control shadow-none" name="nm-depan" maxlength="20">
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Nama Belakang</label>
            <div class="col-8">
              <input type="text" class="form-control shadow-none" name="nm-belakang" maxlength="50">
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Jenis Kelamin</label>
            <div class="col-8">
              <select name="jns-kelamin" class="form-select shadow-none">
                <option value="" selected>--Pilih--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Agama</label>
            <div class="col-8">
              <select name="nm-agama" class="form-select shadow-none">
                <option value="" selected>--Pilih--</option>
                <option value="Islam">Islam</option>
                <option value="Katholik">Katholik</option>
                <option value="Protestan">Protestan</option>
                <option value="Budha">Budha</option>
                <option value="Hinddu">Hinddu</option>
                <option value="Konghucu">Konghucu</option>
              </select>
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Tempat Lahir</label>
            <div class="col-8">
              <input type="text" class="form-control shadow-none" name="tmp-lahir" maxlength="30">
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Tanggal Lahir</label>
            <div class="col-8">
              <input type="text" class="form-control shadow-none datepicker" name="tgl-lahir" maxlength="10">
              <small class="form-text text-danger"></small>
            </div>
					</div>
          <div class="form-group row mb-2">
					  <label class="col-4 col-form-label text-end">Alamat Rumah</label>
            <div class="col-8">
              <textarea class="form-control shadow-none" name="alamat-rumah" cols="30" rows="2"></textarea>
              <small class="form-text text-danger"></small>
            </div>
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="button" class="btn btn-primary" id="btnSaveUpdate" onclick="SaveUpdate()"><i class="fa fa-floppy-disk"></i> Save</button>
      </div>
    </div>
  </div>
</div>