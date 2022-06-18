<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" id="link" name="link[]" value="<?= (isset($get->link)) ? "https://www.youtube.com/embed/$get->link" : ''; ?>" placeholder="Link" required />
    </div>
</div>

<br>

<textarea name="deskripsi[]" class="textarea" id="deskripsi" placeholder="Deskripsi..."><?= (isset($get->deskripsi)) ? $get->deskripsi : ''; ?></textarea>

<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />

<script>
    $('.textarea').summernote({
        inheritPlaceholder: true,
        disableDragAndDrop: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        tabDisable: true,
        popover: {
            // image: [
            //     ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            //     ['float', ['floatLeft', 'floatRight', 'floatNone']],
            //     ['remove', ['removeMedia']]
            // ],   
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture']]
            ]
        },
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'table']],
            // ['media', ['picture', 'video', 'hr']],
            // ['view', ['codeview', 'help']],
        ]
    })
</script>