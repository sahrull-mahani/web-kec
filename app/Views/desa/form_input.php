<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama_desa" class="col-sm-3 col-form-label">Nama Desa</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama_desa" name="nama_desa[]" value="<?= (isset($get->nama_desa)) ? $get->nama_desa : ''; ?>" placeholder="Nama Desa" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="kepala_desa" class="col-sm-3 col-form-label">Kepala Desa</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kepala_desa" name="kepala_desa[]" value="<?= (isset($get->kepala_desa)) ? $get->kepala_desa : ''; ?>" placeholder="Kepala Desa" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />