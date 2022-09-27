<?= form_open_multipart('jumlahpenduduk/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="col-md-12">
        <div class="form-group item">
            <select name="dusun" id="dusun" class="form-control select2">
                <option value="" disabled <?= (isset($get->individu_id) ? '' : 'selected') ?>>Pilih Dusun</option>
                <?php foreach ($individu as $row) : ?>
                    <option value="<?= $row->dusun; ?>" <?= (isset($get->individu_id) ? ($get->individu_id == $row->id ? 'selected' : '') : '') ?>><?= $row->dusun ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <div class="form-group item col-md-6">
                <label for="jumlah_jiwa">Jumlah Jiwa</label>
                <input type="text" class="form-control" id="jumlah_jiwa" name="jumlah_jiwa" value="<?= (isset($get->jumlah_jiwa)) ? $get->jumlah_jiwa : ''; ?>" placeholder="Jumlah Jiwa" required />
            </div>
            <div class="form-group item col-md-6">
                <label for="jumlah_kk">Jumlah Kartu Keluarga</label>
                <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" value="<?= (isset($get->jumlah_kk)) ? $get->jumlah_kk : ''; ?>" placeholder="Jumlah Kartu Keluarga" required />
            </div>
        </div>
        <div class="card-header">
            <h3 class="card-title">Jumlah Menurut Usia</h3>
        </div>
        <div class="card-body">
            <div class="form-group item">
                <label for="umur">Umur</label>
                <?php $defaults = array('' => 'Pilih Berdasarkan Umur');
                $options = array(
                    '0 - 4' => '0 - 4 Tahun',
                    '5 - 9' => '5 - 9 Tahun',
                    '10 - 14' => '10 - 14 Tahun',
                    '15 - 19' => '15 - 19 Tahun',
                    '20 - 24' => '20 - 24 Tahun',
                    '25 - 29' => '25 - 29 Tahun',
                    '30 - 34' => '30 - 34 Tahun',
                    '35 - 39' => '35 - 39 Tahun',
                    '40 - 44' => '40 - 44 Tahun',
                    '45 - 49' => '45 - 49 Tahun',
                    '50 - 54' => '50 - 54 Tahun',
                    '55 - 59' => '55 - 59 Tahun',
                    '60 - 64' => '60 - 64 Tahun',
                    '65 - 69' => '65 - 69 Tahun',
                    '70 - 74' => '70 - 74 Tahun',
                    '75 - 79' => '75 - 79 Tahun',
                    '80 - 84' => '80 - 84 Tahun',
                );
                echo form_dropdown('umur[]', $defaults + $options, (isset($get->umur)) ? $get->umur : '', 'class="form-control select2" id="umur" required');
                ?>

            </div>
            <div class="row">
                <div class="form-group item col-md-4">
                    <label for="jumlah_pria">Laki - Laki</label>
                    <input type="text" class="form-control" id="jumlah_pria" name="jumlah_pria" value="<?= (isset($get->jumlah_pria)) ? $get->jumlah_pria : ''; ?>" placeholder="Jumlah Pria" required />
                </div>
                <div class="form-group item col-md-4">
                    <label for="jumlah_wanita">Perempuan</label>
                    <input type="text" class="form-control" id="jumlah_wanita" name="jumlah_wanita" value="<?= (isset($get->jumlah_wanita)) ? $get->jumlah_wanita : ''; ?>" placeholder="Jumlah Wanita" required />
                </div>
                <div class="form-group item col-md-4">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= (isset($get->jumlah)) ? $get->jumlah : ''; ?>" placeholder="Jumlah" required />
                </div>
            </div>
        </div>
        <div class="card-header">
            <h3 class="card-title">Jumlah Menurut Agama</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group item col-md">
                    <label for="agama_islam">Islam</label>
                    <input type="text" class="form-control" id="agama_islam" name="agama_islam" value="<?= (isset($get->agama_islam)) ? $get->agama_islam : ''; ?>" placeholder="Jumlah Agama Islam" required />
                </div>
                <div class="form-group item col-md">
                    <label for="agama_kristen">Kristen</label>
                    <input type="text" class="form-control" id="agama_kristen" name="agama_kristen" value="<?= (isset($get->agama_kristen)) ? $get->agama_kristen : ''; ?>" placeholder="Jumlah Agama Kristen" required />
                </div>
                <div class="form-group item col-md">
                    <label for="agama_katolik">Katolik</label>
                    <input type="text" class="form-control" id="agama_katolik" name="agama_katolik" value="<?= (isset($get->agama_katolik)) ? $get->agama_katolik : ''; ?>" placeholder="Jumlah Agama Katolik" required />
                </div>
                <div class="form-group item col-md">
                    <label for="agama_hindu">Hindu</label>
                    <input type="text" class="form-control" id="agama_hindu" name="agama_hindu" value="<?= (isset($get->agama_hindu)) ? $get->agama_hindu : ''; ?>" placeholder="Jumlah Agama Hindu" required />
                </div>
                <div class="form-group item col-md">
                    <label for="agama_budha">Budha</label>
                    <input type="text" class="form-control" id="agama_budha" name="agama_budha" value="<?= (isset($get->agama_budha)) ? $get->agama_budha : ''; ?>" placeholder="Jumlah Agama Budha" required />
                </div>
            </div>
        </div>
        <textarea name="keterangan" id="keterangan" class="form-control my-4" cols="10" rows="10" placeholder="Keterangan...."><?= (isset($get->keterangan)) ? $get->keterangan : ''; ?></textarea>
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