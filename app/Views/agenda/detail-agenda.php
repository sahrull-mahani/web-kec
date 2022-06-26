<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<small><i class="fa fa-map-marker text-danger"></i> Lokasi : <?= $get->lokasi ?> | <i class="fa fa-clock"></i> Dibuat : <?= $get->updated_at ?></small>
<hr>
<?= $get->isi_agenda ?>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />