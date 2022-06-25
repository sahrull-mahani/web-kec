<?= form_open_multipart('program/save', array('class' => 'form-horizontal mode2')); ?>
<div class="card-body">
    <div class="form-group item">
        <label for="judul">Judul Postingan</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
    <input id="input-edit-program" type="file" name="userfile[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
    <div class="form-group item mt-3">
        <label for="body">Isi Program</label>
        <textarea class="text-area" name="isi" id="isi"><?= (isset($get->isi_program)) ? $get->isi_program : ''; ?></textarea>
    </div>
</div>
<?php foreach ($gambar as $pic) {
    $pics[] = base_url('/Berita/img_medium') . "/$pic->sumber";
} ?>

<div class="card-footer">
    <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
    <?php if ($status == null) : ?>
        <?php if (is_admin()) : ?>
            <button type="submit" id="publish" class="btn btn-success">PUBLISH</button>
        <?php endif ?>
        <input type='hidden' name='action' value="update" />
        <button type="submit" class="btn btn-primary">EDIT</button>
    <?php else : ?>
        <input type='hidden' name='action' value="delete" />
        <button type="submit" class="btn btn-danger">DELETE</button>
    <?php endif ?>
</div>
<?= form_close(); ?>
<script type='text/javascript'>
    $.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
    $("#input-edit-program").fileinput({
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
            text: "Publish Obyek Wisata Ini..!",
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
                    url: location.origin + "/pariwisata/save",
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