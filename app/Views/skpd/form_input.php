<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="kode" class="col-sm-3 col-form-label">Kode</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kode" name="kode[]" value="<?= (isset($get->kode)) ? $get->kode : ''; ?>" placeholder="Kode" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alias" class="col-sm-3 col-form-label">Alias</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alias" name="alias[]" value="<?= (isset($get->alias)) ? $get->alias : ''; ?>" placeholder="Alias" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />