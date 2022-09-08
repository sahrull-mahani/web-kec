<?= form_open_multipart('datakematian/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="col-md-12">
        <div class="row">
            <div class="form-group item col-md-8">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama Lengkap" required />
            </div>
            <div class="form-group item col-md-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <?php $defaults = array('' => 'Pilih');
                $options = array(
                    'Laki - Laki' => 'Laki - Laki',
                    'Perempuan' => 'Perempuan',
                );
                echo form_dropdown('jenis_kelamin[]', $defaults + $options, (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : '', 'class="form-control select2" id="jenis_kelamin" required');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group item col-md-6">
                <label for="tgl_kematian">Tanggal Kematian</label>
                <input type="date" class="form-control" id="tgl_kematian" name="tgl_kematian" value="<?= (isset($get->tgl_kematian)) ? $get->tgl_kematian : ''; ?>" required />
            </div>
            <div class="form-group item col-md-6">
                <label for="jam_kematian">Tanggal Kematian</label>
                <input type="time" class="form-control" id="jam_kematian" name="jam_kematian" value="<?= (isset($get->jam_kematian)) ? $get->jam_kematian : ''; ?>" required />
            </div>
        </div>
        <div class="form-group item">
            <label for="tempat_kematian">Tempat Kematian</label>
            <input type="text" class="form-control" id="tempat_kematian" name="tempat_kematian" value="<?= (isset($get->tempat_kematian)) ? $get->tempat_kematian : ''; ?>" placeholder="Tempat Kematian" required />
        </div>
        <div class="row">
            <div class="form-group item col-md-6">
                <label for="tgl_kubur">Tanggal Dikebumikan</label>
                <input type="date" class="form-control" id="tgl_kubur" name="tgl_kubur" value="<?= (isset($get->tgl_kubur)) ? $get->tgl_kubur : ''; ?>" required />
            </div>
            <div class="form-group item col-md-6">
                <label for="jam_kubur">Jam Dikebumikan</label>
                <input type="time" class="form-control" id="jam_kubur" name="jam_kubur" value="<?= (isset($get->jam_kubur)) ? $get->jam_kubur : ''; ?>" required />
            </div>
        </div>
        <div class="form-group item">
            <label for="tempat_kubur">Tempat Pekuburan</label>
            <input type="text" class="form-control" id="tempat_kubur" name="tempat_kubur" value="<?= (isset($get->tempat_kubur)) ? $get->tempat_kubur : ''; ?>" placeholder="Tempat Pekuburan" required />
        </div>
        <div class="form-group item">
            <label for="alamat">Alamat Pekuburan</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (isset($get->alamat)) ? $get->alamat : ''; ?>" placeholder="Alamat Pekuburan" required />
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