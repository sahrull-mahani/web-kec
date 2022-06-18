<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i></h5>
</div>
<div class="form-group row mode2 ">
    <label for="judul" class="col-sm-3 col-form-label">Judul</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="deskripsi" name="deskripsi[]" value="<?= (isset($get->deskripsi)) ? $get->deskripsi : ''; ?>" placeholder="Deskripsi" required />
    </div>
</div>

<div class="form-group row mode2">
    <label class="col-form-label col-sm-3 ">Pilih Photo</label>
    <div class="col-sm-9 item">
        <input type="file" multiple="true" class="form-control" id="sumber" name="sumber[]" value="" required onchange="previewImg(this)">
    </div>
    <h1></h1>
</div>

<div class="form-group row mt-4 mode2">
    <label class="col-form-label col-sm-3 ">Photo</label>
    <div class="col-sm-12 col-md-7">
        <?php if (isset($get->sumber)) : ?>
            <img class="img-preview img-fluid col-sm-6" src="<?= site_url('Berita/img_medium/' . $get->sumber) ?>" alt="">
        <?php else : ?>
            <img class="img-preview img-fluid mb-2 col-sm-6">

        <?php endif; ?>
    </div>
</div>

<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<input type="hidden" name="old_file[]" value="<?= (isset($get->sumber)) ? $get->sumber : ''; ?>" />


<script>
    function previewImg(sumber) {

        if (sumber.files[0]) {

            var filesAmount = sumber.files[0].length;

            console.log(filesAmount)
            die();
            // for (i = 0; i < filesAmount; i++) {

            const reader = new FileReader();
            reader.onload = function(e) {

                $(sumber).parent().parent().next().find("img")
                    .attr("src", e.target.result);
            };
            reader.readAsDataURL(sumber.files[0]);
            $(".img-preview").show();
            // }

        } else {
            $("img-preview").hide();
        }
    }


    // $(function() {
    //     // Multiple images preview in browser
    //     var imagesPreview = function(input, placeToInsertImagePreview) {

    //         if (input.files) {
    //             var filesAmount = input.files.length;

    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();
    //                 reader.onload = function(event) {
    //                     $(sumber).parent().parent().next().find("img").attr('src', event.target.result).appendTo(placeToInsertImagePreview);
    //                 }

    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }

    //     };

    //     $('#sumber').on('change', function() {
    //         imagesPreview(this, '.img-preview');
    //     });
    // });
    // 
</script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->