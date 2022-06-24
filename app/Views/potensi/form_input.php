<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <?php $defaults = array('' => '==Pilih Bidang==');
        $options = array(
            'peristiwa' => 'peristiwa',
            'kelautan' => 'kelautan',
            'perdagangan' => 'perdagangan',
            'pertanian' => 'pertanian',
            'industri' => 'industri',
            'pendidikan' => 'pendidikan',
        );
        echo form_dropdown('bidang[]', $defaults + $options, (isset($get->bidang)) ? $get->bidang : '', 'class="form-control" id="bidang" required');
        ?>
    </div>
</div>
<div class="form-group row mode2 mb-3">
    <div class="col-sm-12 item">
        <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
</div>
<textarea name="isi_potensi[]" id="isi_potensi" class="text-area" cols="30" rows="10"><?= (isset($get->isi_potensi)) ? $get->isi_potensi : ''; ?></textarea>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    $('.text-area').summernote({
        placeholder: "Isi Potensi ...",
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
        ],
        callback: {
            onPaste: function(e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                document.execCommand('insertText', false, bufferText);
            },
        }
    })
</script>