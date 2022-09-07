<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nkk" class="col-sm-3 col-form-label">Nkk</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nkk" name="nkk[]" value="<?= (isset($get->nkk)) ? $get->nkk : ''; ?>" placeholder="Nkk" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nik" class="col-sm-3 col-form-label">Nik</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nik" name="nik[]" value="<?= (isset($get->nik)) ? $get->nik : ''; ?>" placeholder="Nik" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="provinsi" name="provinsi[]" value="<?= (isset($get->provinsi)) ? $get->provinsi : ''; ?>" placeholder="Provinsi" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kabupaten" name="kabupaten[]" value="<?= (isset($get->kabupaten)) ? $get->kabupaten : ''; ?>" placeholder="Kabupaten" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kecamatan" name="kecamatan[]" value="<?= (isset($get->kecamatan)) ? $get->kecamatan : ''; ?>" placeholder="Kecamatan" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="desa" class="col-sm-3 col-form-label">Desa</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="desa" name="desa[]" value="<?= (isset($get->desa)) ? $get->desa : ''; ?>" placeholder="Desa" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="dusun" class="col-sm-3 col-form-label">Dusun</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="dusun" name="dusun[]" value="<?= (isset($get->dusun)) ? $get->dusun : ''; ?>" placeholder="Dusun" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alamat" name="alamat[]" value="<?= (isset($get->alamat)) ? $get->alamat : ''; ?>" placeholder="Alamat" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin[]" value="<?= (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : ''; ?>" placeholder="Jenis Kelamin" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir[]" value="<?= (isset($get->tempat_lahir)) ? $get->tempat_lahir : ''; ?>" placeholder="Tempat Lahir" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir[]" value="<?= (isset($get->tanggal_lahir)) ? $get->tanggal_lahir : ''; ?>" placeholder="Tanggal Lahir" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="umur" class="col-sm-3 col-form-label">Umur</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="umur" name="umur[]" value="<?= (isset($get->umur)) ? $get->umur : ''; ?>" placeholder="Umur" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="status_nikah" class="col-sm-3 col-form-label">Status Nikah</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="status_nikah" name="status_nikah[]" value="<?= (isset($get->status_nikah)) ? $get->status_nikah : ''; ?>" placeholder="Status Nikah" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="agama" name="agama[]" value="<?= (isset($get->agama)) ? $get->agama : ''; ?>" placeholder="Agama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="suku_bangsa" class="col-sm-3 col-form-label">Suku Bangsa</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="suku_bangsa" name="suku_bangsa[]" value="<?= (isset($get->suku_bangsa)) ? $get->suku_bangsa : ''; ?>" placeholder="Suku Bangsa" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="warga_negara" class="col-sm-3 col-form-label">Warga Negara</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="warga_negara" name="warga_negara[]" value="<?= (isset($get->warga_negara)) ? $get->warga_negara : ''; ?>" placeholder="Warga Negara" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="no_hp" class="col-sm-3 col-form-label">No Hp</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="no_hp" name="no_hp[]" value="<?= (isset($get->no_hp)) ? $get->no_hp : ''; ?>" placeholder="No Hp" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="no_wa" class="col-sm-3 col-form-label">No Wa</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="no_wa" name="no_wa[]" value="<?= (isset($get->no_wa)) ? $get->no_wa : ''; ?>" placeholder="No Wa" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="wajib_pajak" class="col-sm-3 col-form-label">Wajib Pajak</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="wajib_pajak" name="wajib_pajak[]" value="<?= (isset($get->wajib_pajak)) ? $get->wajib_pajak : ''; ?>" placeholder="Wajib Pajak" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="besar_pajak" class="col-sm-3 col-form-label">Besar Pajak</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="besar_pajak" name="besar_pajak[]" value="<?= (isset($get->besar_pajak)) ? $get->besar_pajak : ''; ?>" placeholder="Besar Pajak" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="ket_pajak" class="col-sm-3 col-form-label">Ket Pajak</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="ket_pajak" name="ket_pajak[]" value="<?= (isset($get->ket_pajak)) ? $get->ket_pajak : ''; ?>" placeholder="Ket Pajak" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="email" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="email" name="email[]" value="<?= (isset($get->email)) ? $get->email : ''; ?>" placeholder="Email" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="facebook" name="facebook[]" value="<?= (isset($get->facebook)) ? $get->facebook : ''; ?>" placeholder="Facebook" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="twiteer" class="col-sm-3 col-form-label">Twiteer</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="twiteer" name="twiteer[]" value="<?= (isset($get->twiteer)) ? $get->twiteer : ''; ?>" placeholder="Twiteer" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="instagram" name="instagram[]" value="<?= (isset($get->instagram)) ? $get->instagram : ''; ?>" placeholder="Instagram" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />