<?= form_open_multipart('jumlahpenduduk/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="col-md-12">
        <div class="form-group item">
            <label for="dusun">Dusun</label>
            <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun" value="<?= (isset($data->individu_id) ? $data->dusun : '') ?>" required />
        </div>
        <div class="row">
            <div class="form-group item col-md-6">
                <label for="no_kk">Nomor Kartu Keluarga</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= (isset($data->individu_id) ? $data->no_kk : '') ?>" required />
            </div>
            <div class="form-group item col-md-6">
                <label for="nik">Nomor Induk Kependudukan</label>
                <select name="individu_id" id="nik" class="form-control select2">
                    <option value="" disabled <?= (isset($get->individu_id) ? '' : 'selected') ?>>--Pilih NIK--</option>
                    <?php foreach ($individu as $row) : ?>
                        <option value="<?= $row->id; ?>" <?= (isset($get->individu_id) ? ($get->individu_id == $row->id ? 'selected' : '') : '') ?>><?= $row->nik . ' - ' . ucwords($row->nama) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group item">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= (isset($data->individu_id) ? $data->nama : '') ?>" required />
        </div>
        <div class="form-group item">
            <label for="pekerjaan">Pekerjaan</label>
            <!-- <select class="form-control" name="pekerjaan[]" id="pekerjaan">
                                        <option value="">Pilih Pekerjaan</option>

                                        <option value="Petani Pemilik Lahan">Petani Pemilik Lahan Tahun</option>
                                        <option value="Petani Penyewa">Petani Penyewa</option>
                                        <option value="Buruh Tani">Buruh Tani</option>
                                        <option value="Nelayan Pemilik Kapal/Perahu">Nelayan Pemilik Kapal/Perahu</option>
                                        <option value="Nelayan Penyewa Kapal/Perahu">Nelayan Penyewa Kapal/Perahu</option>
                                        <option value="Buruh Nelayan">Buruh Nelayan</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Guru Agama">Guru Agama</option>
                                        <option value="Pedagang">Pedagang</option>
                                        <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                        <option value="PNS">PNS</option>
                                        <option value="TNI">TNI</option>
                                        <option value="Perangkat Desa">Perangkat Desa</option>
                                        <option value="Pegawai Kantor Desa">Pegawai Kantor Desa</option>
                                        <option value="TKI">TKI</option>
                                        <option value="Lainnya">Lainnya</option>

                                    </select> -->
            <?php $defaults = array('' => 'Pilih Pekerjaan');
            $options = array(
                'Petani Pemilik Lahan' => 'Petani Pemilik Lahan Tahun',
                'Petani Penyewa' => 'Petani Penyewa',
                'Buruh Tani' => 'Buruh Tani',
                'Nelayan Pemilik Kapal/Perahu' => 'Nelayan Pemilik Kapal/Perahu',
                'Nelayan Penyewa Kapal/Perahu' => 'Nelayan Penyewa Kapal/Perahu',
                'Buruh Nelayan' => 'Buruh Nelayan',
                'Guru' => 'Guru',
                'Guru Agama' => 'Guru Agama',
                'Pedagang' => 'Pedagang',
                'Pengolahan/Industri' => 'Pengolahan/Industri',
                'PNS' => 'PNS',
                'TNI' => 'TNI',
                'Perangkat Desa' => 'Perangkat Desa',
                'Pegawai Kantor Desa' => 'Pegawai Kantor Desa',
                'TKI' => 'TKI',
                'Lainnya' => 'Lainnya',
            );
            echo form_dropdown('pekerjaan[]', $defaults + $options, (isset($data->individu_id)) ? $data->pekerjaan : '', 'class="form-control select2" id="pekerjaan" required');
            ?>
        </div>
        <div class="card-header">
            <h3 class="card-title">Penyakit Yang Di Derita Selama 1 Tahun Terakhir</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="muntaber_diare">Muntaber/Diare</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('muntaber_diare[]', $defaults + $options, (isset($data->individu_id)) ? $data->muntaber_diare : '', 'class="form-control" id="muntaber_diare" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="hepatitis_e">Hepatitis E</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('hepatitis_e[]', $defaults + $options, (isset($data->individu_id)) ? $data->hepatitis_e : '', 'class="form-control" id="hepatitis_e" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="jantung">Jantung</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('jantung[]', $defaults + $options, (isset($data->individu_id)) ? $data->jantung : '', 'class="form-control" id="jantung" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="demam_berdarah">Demam Berdarah</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('demam_berdarah[]', $defaults + $options, (isset($data->individu_id)) ? $data->demam_berdarah : '', 'class="form-control" id="demam_berdarah" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="difteri">Difteri</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('difteri[]', $defaults + $options, (isset($data->individu_id)) ? $data->difteri : '', 'class="form-control" id="difteri" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="tbc_paru">TBC Paru Paru</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('tbc_paru[]', $defaults + $options, (isset($data->individu_id)) ? $data->tbc_paru : '', 'class="form-control" id="tbc_paru" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="campak">Campak</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('campak[]', $defaults + $options, (isset($data->individu_id)) ? $data->campak : '', 'class="form-control" id="campak" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="cikungunya">Cikungunya</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('cikungunya[]', $defaults + $options, (isset($data->individu_id)) ? $data->chikungunya : '', 'class="form-control" id="cikungunya" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="kanker">Kanker</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('kanker[]', $defaults + $options, (isset($data->individu_id)) ? $data->kanker : '', 'class="form-control" id="kanker" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="malaria">Malaria</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('malaria[]', $defaults + $options, (isset($data->individu_id)) ? $data->malaria : '', 'class="form-control" id="malaria" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="leptospirosis">Leptospirosis</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('leptospirosis[]', $defaults + $options, (isset($data->individu_id)) ? $data->leptospirosis : '', 'class="form-control" id="leptospirosis" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="diabetes">Diabetes</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('diabetes[]', $defaults + $options, (isset($data->individu_id)) ? $data->diabetes : '', 'class="form-control" id="diabetes" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="fluburung_sars">Flu Burung/SARS</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('fluburung_sars[]', $defaults + $options, (isset($data->individu_id)) ? $data->fluburung_sars : '', 'class="form-control" id="fluburung_sars" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="kolera">Kolera</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('kolera[]', $defaults + $options, (isset($data->individu_id)) ? $data->kolera : '', 'class="form-control" id="kolera" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="lumpuh">Lumpuh</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('lumpuh[]', $defaults + $options, (isset($data->individu_id)) ? $data->lumpuh : '', 'class="form-control" id="lumpuh" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="covid_19">Covid-19</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('covid_19[]', $defaults + $options, (isset($data->individu_id)) ? $data->covid_19 : '', 'class="form-control" id="covid_19" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="gizi_buruk">Gizi Buruk</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('gizi_buruk[]', $defaults + $options, (isset($data->individu_id)) ? $data->gizi_buruk : '', 'class="form-control" id="gizi_buruk" required');
                    ?>
                </div>
                <div class="form-group item col-md-4">
                    <label for="hepatitis_b">Hepatitis B</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('hepatitis_b[]', $defaults + $options, (isset($data->individu_id)) ? $data->hepatitis_b : '', 'class="form-control" id="hepatitis_b" required');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="lainnya">Lainnya</label>
                    <?php $defaults = array('' => 'Pilih');
                    $options = array(
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                    );
                    echo form_dropdown('lainnya[]', $defaults + $options, (isset($data->individu_id)) ? $data->lainnya : '', 'class="form-control" id="lainnya" required');
                    ?>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
            <input type='hidden' name='action' value="update" />
            <button type="submit" class="btn btn-primary">UPDATE</button>

        </div>
        <?= form_close(); ?>
        <script type='text/javascript'>
            $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
            // with plugin options
            // $("#input-id").fileinput({
            //     'dropZoneEnabled': false
            // })


            $.fn.modal.Constructor.prototype._enforceFocus = function() {};
            $('form').on('blur', 'input[required], input.optional, select.required', validator.checkField).on('change', 'select.required', validator.checkField).on('keypress', 'input[required][pattern]', validator.keypress);
            $('.multi.required').on('keyup blur', 'input', function() {
                validator.checkField.apply($(this).siblings().last()[0]);
            });
            $('form').submit(function(e) {
                e.preventDefault();
                if (!validator.checkAll($(this))) {
                    return false;
                } else {
                    var data = new FormData(this)
                    var url = $(this).attr('action')
                    simpan(url, data)
                }
            });

            $('#publish').click(function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Anda Yakin',
                    text: "Publish Kuliner Ini..!",
                    icon: 'question',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    denyButtonText: `Batal`,
                }).then((result) => {
                    console.log(result)
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: location.origin + "/jumlahpenduduk/save",
                            type: 'POST',
                            data: {
                                id: '<?= $get->id ?>',
                                action: 'publish',
                            },
                            dataType: "html",
                            success: function(response) {
                                var data = $.parseJSON(response);
                                Swal.fire({
                                    title: data.title,
                                    html: data.text,
                                    type: data.type
                                }).then((result) => {
                                    if (data.type == "success") {
                                        $('#modal_content').modal('hide');
                                        $('#table').bootstrapTable('refresh');
                                    } else {
                                        $('#spinner').hide();
                                    }
                                });
                            },
                            error: function(jqXHR, exception, thrownError) {
                                Swal.fire({
                                    title: 'Error code' + jqXHR.status,
                                    html: thrownError + ', ' + exception,
                                    type: 'error'
                                }).then((result) => {
                                    $('#spinner').hide();
                                });
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Anda Membatalkan Proses Approve', '', 'info')
                    }
                })
            })

            function simpan(url, data) {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        var data = $.parseJSON(response);
                        Swal.fire({
                            title: data.title,
                            html: data.text,
                            type: data.type
                        }).then((result) => {
                            if (data.type == "success") {
                                $('#modal_content').modal('hide');
                                $('#table').bootstrapTable('refresh');
                            } else {
                                $('#spinner').hide();
                            }
                        });
                    },
                    error: function(jqXHR, exception, thrownError) {
                        Swal.fire({
                            title: 'Error code' + jqXHR.status,
                            html: thrownError + ', ' + exception,
                            type: 'error'
                        }).then((result) => {
                            $('#spinner').hide();
                        });
                    }
                });
            }
        </script>
        <script src="<?= base_url('assets/dist/js/script.js') ?>"></script>