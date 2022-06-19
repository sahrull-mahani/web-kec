<?= form_open_multipart('berita/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="form-group item">
        <label for="judul">Judul Postingan</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
    <input id="input-id" type="file" name="userfile[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
    <div class="form-group item mt-3">
        <label for="body">Isi Berita</label>
        <textarea class="text-area" name="isi" id="isi"><?= (isset($get->isi_berita)) ? $get->isi_berita : ''; ?></textarea>
    </div>
</div>
<div class="card-footer">
    <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
    <input type='hidden' name='action' value='<?= (isset($action)) ? $action : 'insert'; ?>' />
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= form_close(); ?>
<script type='text/javascript'>
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
            var action = $('.action').val()
            if (action == 'editor' || action == 'upprove') {
                Swal.fire({
                    title: 'Anda Yakin',
                    text: "Approve Artikel Ini..!",
                    icon: 'warning',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                    denyButtonText: `Batal`,
                }).then((result) => {
                    console.log(result)
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        simpan(url, data)
                    } else if (result.isDenied) {
                        Swal.fire('Anda Membatalkan Proses Approve', '', 'info')
                    }
                })
            } else {
                simpan(url, data)
            }
        }
    });

    $('.tolak').click(function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'Masukkan Pesan Anda..!!',
            input: 'textarea',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            allowOutsideClick: true,
            preConfirm: (login) => {
                if (!login) {
                    Swal.showValidationMessage(
                        `Request failed: Masukan Pesan Anda!`
                    )
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: location.origin + "/berita/save",
                    type: 'POST',
                    data: {
                        id: '<?= $get->id ?>',
                        action: 'tolak',
                        pesan: result.value
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