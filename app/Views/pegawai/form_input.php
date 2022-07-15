<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nip" class="col-sm-3 col-form-label">Nip</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nip" name="nip[]" value="<?= (isset($get->nip)) ? $get->nip : ''; ?>" placeholder="Nip" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="jk" class="col-sm-3 col-form-label">Jk</label>
    <div class="col-sm-9 item">
        <?php $defaults = array('' => '==Pilih Jk==');
        $options = array(
            'Laki-Laki' => 'Laki-Laki',
            'Perempuan' => 'Perempuan',
        );
        echo form_dropdown('jk[]', $defaults + $options, (isset($get->jk)) ? $get->jk : '', 'class="form-control" id="jk" ');
        ?>
    </div>
</div>
<div class="form-group row mode2">
    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir[]" value="<?= (isset($get->tempat_lahir)) ? $get->tempat_lahir : ''; ?>" placeholder="Tempat Lahir" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tgl Lahir</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir[]" value="<?= (isset($get->tgl_lahir)) ? get_format_date($get->tgl_lahir) : ''; ?>" placeholder="Tgl Lahir" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="gelar_depan" class="col-sm-3 col-form-label">Gelar Depan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="gelar_depan" name="gelar_depan[]" value="<?= (isset($get->gelar_depan)) ? $get->gelar_depan : ''; ?>" placeholder="Gelar Depan" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="gelar_belakang" class="col-sm-3 col-form-label">Gelar Belakang</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang[]" value="<?= (isset($get->gelar_belakang)) ? $get->gelar_belakang : ''; ?>" placeholder="Gelar Belakang" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="pangkat" class="col-sm-3 col-form-label">Jabatan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="pangkat" name="pangkat[]" value="<?= (isset($get->pangkat)) ? $get->pangkat : ''; ?>" placeholder="Pangkat" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alamat" name="alamat[]" value="<?= (isset($get->alamat)) ? $get->alamat : ''; ?>" placeholder="Alamat" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
    <div class="col-sm-9 item">
        <?php $defaults = array('' => '==Pilih Pendidikan==');
        $options = array(
            'S3' => 'S3',
            'S2' => 'S2',
            'S1/D4' => 'S1/D4',
            'D3' => 'D3',
            'D2' => 'D2',
            'D1' => 'D1',
            'SMA/SMK/MA' => 'SMA/SMK/MA',
        );
        echo form_dropdown('pendidikan[]', $defaults + $options, (isset($get->pendidikan)) ? $get->pendidikan : '', 'class="form-control" id="pendidikan" ');
        ?>
    </div>
</div>
<div class="form-group row mode2">
    <label for="lulusan" class="col-sm-3 col-form-label">Lulusan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="lulusan" name="lulusan[]" value="<?= (isset($get->lulusan)) ? $get->lulusan : ''; ?>" placeholder="Lulusan" />
    </div>
</div>
<div class="form-group row mode2">
    <label for="poto" class="col-sm-3 col-form-label">Poto</label>
    <div class="col-sm-9 item">
        <input class="input-edit-pegawai" type="file" name="poto[]" accept=".jpg, .png, image/jpeg, image/png">
        <input type="hidden" name="old_img[]" value="<?= (isset($get->poto)) ? $get->poto : ''; ?>">
    </div>
</div>
<?php $pics = (isset($get->poto)) ? base_url('/Berita/img_medium') . "/$get->poto" : '' ?>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
    // with plugin options
    // $("#input-id").fileinput({
    //     'dropZoneEnabled': false
    // })
    $(".input-edit-pegawai").fileinput({
        'showUpload': false,
        'showRemove': false,
        'showCancel': false,
        'previewFileType': 'image',
        'browseOnZoneClick': true,
        'allowedFileExtensions': ["jpg", "png", "jpeg"],
        'browseLabel': 'Pilih Gambar',
        'browseClass': 'btn btn-success btn-block',
        'browseIcon': '<i class="fa fa-camera"></i> ',
        'overwriteInitial': true,
        'initialPreviewAsData': true,
        'initialPreview': <?= json_encode($pics) ?>
    })
</script>