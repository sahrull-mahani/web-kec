<?= form_open_multipart('berita/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="form-group item">
        <label for="judul">Judul Postingan</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
    <input id="input-id" type="file" name="userfile[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
    <div class="form-group item mt-3">
        <label for="body">Isi Berita</label>
        <textarea class="text-area" name="isi" id="isi"><?= (isset($get->body)) ? $get->body : ''; ?></textarea>
    </div>
</div>
<div class="card-footer">
    <input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
    <input type='hidden' name='action' value='<?= (isset($action)) ? $action : 'insert'; ?>' />
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= form_close(); ?>