<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group mode2">
    <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
</div>
<?php if (@$id == 4) : ?>
    <div class="form-group mode2">
        <textarea name="visi[]" id="visi" cols="30" rows="10" class="text-area" placeholder="Masukan Visi..."><?= explode('[|]', @$get->body)[0] ?></textarea>
    </div>
    <div class="form-group mode2">
        <textarea name="misi[]" id="misi" cols="30" rows="10" class="text-area" placeholder="Masukan Misi..."><?= explode('[|]', @$get->body)[1] ?></textarea>
    </div>
<?php else : ?>
    <div class="form-group mode2">
        <textarea name="body[]" id="body" cols="30" rows="10" class="text-area" placeholder="Masukan isi..."><?= (isset($get->body)) ? $get->body : ''; ?></textarea>
    </div>
<?php endif ?>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    $('.text-area').summernote({
        onPaste: function(e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
        },
        height: 150,
        inheritPlaceholder: true,
        disableDragAndDrop: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        tabDisable: true,
        popover: {
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ]
        },
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontname', 'fontsize', 'fontsizeunit', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'table']],
            ['media', ['link', 'hr']],
        ]
    })
</script>