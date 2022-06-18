<?php
if ($get->status != 4) {
    echo form_open_multipart('berita/save', array('class' => 'form-horizontal mode2')); ?>
    <div class="modal-body">
        <div class="form-group item">
            <label for="judul">Judul Postingan</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group item">
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="userfile" onchange="previewImg(this)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 center">
                <?php $src = isset($get->gambar) ? site_url('berita/img_thumb/' . $get->gambar) : '#'  ?>
                <img alt="User Image" src="<?= $src; ?>" class="mb-3 img-preview" />
            </div>
        </div>
        <div class="form-group item">
            <label for="redaksi_foto">Redaksi Foto</label>
            <input type="text" class="form-control" id="redaksi_foto" name="redaksi_foto" value="<?= (isset($get->redaksi_foto)) ? $get->redaksi_foto : ''; ?>" placeholder="Redaksi Foto" />
        </div>
        <div class="form-group item">
            <label for="body">Isi Berita</label>
            <textarea name="isi" id="isi"><?= (isset($get->body)) ? $get->body : ''; ?></textarea>
        </div>
        <div class="form-group item">
            <label for="tag">Tag Berita</label>
            <?php $option = array();
            $tag = (isset($get->tag)) ? $get->tag : '';
            foreach (explode(', ', $tag) as $val) {
                $option[$val] = $val;
            }
            echo form_dropdown('tag[]', $option, $option, 'class="form-control tag-with-input select2-purple" multiple="" data-placeholder="Tag" style="width: 100%;" tabindex="-1" aria-hidden="true"') ?>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="id" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
        <input type="hidden" name="old_file" value="<?= (isset($get->gambar)) ? $get->gambar : ''; ?>" />
        <?php if (in_groups(['users']) && ($get->status == 1 || $get->status == 3)) { ?>
            <input type='hidden' name='action' class="action" value='<?= $action; ?>' />
            <button type='submit' class='btn btn-primary pull-right' value="edit"><?= $btn; ?></a></button>
        <?php }
        if (in_groups(['editors']) && $get->status == 1) { ?>
            <input type='hidden' name='action' class="action" value='editor' />
            <button type="button" class="btn btn-warning pull-left tolak"><i class="fa fa-times"></i> Perbaiki</button>
            <button type="submit" class="btn btn-info pull-right" value="editor"><i class="fa fa-edit"></i> Editor</button>
        <?php }
        if (in_groups(['publisher']) && $get->status == 2) { ?>
            <input type='hidden' name='action' class="action" value='upprove' />
            <button type="button" class="btn btn-danger pull-left tolak"><i class="fa fa-times"></i> Tolak</button>
            <button type="submit" class="btn btn-success pull-right" value="4"><i class="fa fa-fa-send-o"></i> Upprove</button>
        <?php } ?>
    </div>
    <?php echo form_close(); ?>
    <script src="<?= base_url("assets/plugins/tinymce/tinymce.min.js"); ?>"></script>
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
                        },error: function(jqXHR, exception, thrownError) {
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

        tinymce.init({
            selector: "textarea",
            theme: "modern",
            height: 500,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: false,
            codesample_languages: [{
                    text: 'HTML/XML',
                    value: 'markup'
                },
                {
                    text: 'JavaScript',
                    value: 'javascript'
                },
                {
                    text: 'CSS',
                    value: 'css'
                },
                {
                    text: 'PHP',
                    value: 'php'
                },
                {
                    text: 'Ruby',
                    value: 'ruby'
                },
                {
                    text: 'Python',
                    value: 'python'
                },
                {
                    text: 'Java',
                    value: 'java'
                },
                {
                    text: 'C',
                    value: 'c'
                },
                {
                    text: 'C#',
                    value: 'csharp'
                },
                {
                    text: 'C++',
                    value: 'cpp'
                }
            ],
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars media nonbreaking codesample",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code imagetools autoresize"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | codesample image media emoticons | forecolor backcolor | print preview code ",
            image_advtab: true,

            external_filemanager_path: "<?= site_url('filemanager/'); ?>",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {
                "filemanager": "<?= base_url('filemanager/plugin.min.js'); ?>"
            },
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });
        $(".tag-with-input").select2({
            theme: 'bootstrap4',
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
<?php } else { ?>
    <div class="modal-body">
        <h3 class="text-danger text-center">Berita Yang Telah Diupprove Oleh Redaktur Tidak Dapat Di Ubah Kembali...!</h3>
    </div>
<?php } ?>