<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="lokasi" name="lokasi[]" value="<?= (isset($get->lokasi)) ? $get->lokasi : ''; ?>" placeholder="Lokasi" required />
    </div>
</div>
<textarea class="agenda" id="isi_agenda" name="isi_agenda[]" placeholder="Masukan Isi Agenda..."><?= (isset($get->isi_agenda)) ? $get->isi_agenda : ''; ?></textarea>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    $('.agenda').summernote({
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