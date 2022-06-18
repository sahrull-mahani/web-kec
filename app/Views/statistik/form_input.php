<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="data" class="col-sm-3 col-form-label">Data</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="data" name="data[]" value="<?= (isset($get->data)) ? $get->data : ''; ?>" placeholder="Data" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />