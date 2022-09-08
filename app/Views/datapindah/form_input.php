<?= form_open_multipart('datapindah/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="col-md-12">
        <div class="form-group item">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama Lengkap" required />
        </div>
        <div class="form-group item col-md-6">
            <label for="status">Status Dalam KK</label>
            <input type="text" class="form-control" id="status" name="status" value="<?= (isset($get->status)) ? $get->status : ''; ?>" placeholder="Status Dalam Kartu Keluarga" required />
        </div>
        <div class="form-group item col-md-6">
            <label for="jumlah_kk">Jumlah Kartu Keluarga</label>
            <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" value="<?= (isset($get->jumlah_kk)) ? $get->jumlah_kk : ''; ?>" placeholder="Jumlah Kartu Keluarga" required />
        </div>
        <div class="form-group item">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <?php $defaults = array('' => 'Pilih');
            $options = array(
                'Laki - Laki' => 'Laki - Laki',
                'Wanita' => 'Wanita',
            );
            echo form_dropdown('jenis_kelamin[]', $defaults + $options, (isset($get->jenis_kelamin)) ? $get->jenis_kelamin : '', 'class="form-control select2" id="jenis_kelamin" required');
            ?>
        </div>
        <div class="form-group">
            <label for="tgl_pindah">Tanggal Pindah</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= (isset($get->tgl_pindah)) ? $get->tgl_pindah : ''; ?>" />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <div class="form-group item">
            <label for="alamat_pindah">Alamat Pindah</label>
            <input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" value="<?= (isset($get->alamat_pindah)) ? $get->alamat_pindah : ''; ?>" placeholder="Alamat Pindah" required />
        </div>
        <div class="form-group item">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= (isset($get->keterangan)) ? $get->keterangan : ''; ?>" placeholder="Keterangan" required />
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