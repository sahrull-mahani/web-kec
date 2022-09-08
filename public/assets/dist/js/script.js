$.fn.fileinputBsVersion = "3.3.7"; // if not set, this will be auto-derived
// with plugin options
// $("#single-input").fileinput({
//     'showUpload': false,
//     'showCancel': false,
//     'dropZoneEnabled': false
// })
$("#input-id").fileinput({
    'showUpload': false,
    'showRemove': false,
    'showCancel': false,
    'previewFileType': 'image',
    'browseOnZoneClick': true,
    'required': true,
    'allowedFileExtensions': ["jpg", "png", "jpeg"],
    'browseLabel': 'Pilih Gambar',
    'browseClass': 'btn btn-success btn-block',
    'browseIcon': '<i class="fa fa-camera"></i> ',
})

$('.text-area').summernote({
    onPaste: function (e) {
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

$('.select2').select2()

function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".img-preview")
                .attr("src", e.target.result)
                .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        $(".img-preview").show();
    } else {
        $("img-preview").hide();
    }
}
$(".tag-with-input").select2({
    theme: 'bootstrap4',
    tags: true,
    tokenSeparators: [',', ' ']
})

window.onload = function(){
    document.getElementById("Lokasi").style.display='none';
    document.getElementById("Keluarga").style.display='none';
    document.getElementById("Permukiman").style.display='none';
    // $("#Lokasi").hide();
    // $("#Keluarga").hide();
    // $("#Permukiman").hide();
  };


function Step() {
    var w = document.getElementById("Enum");
    var x = document.getElementById("Lokasi");
    var y = document.getElementById("Keluarga");
    var z = document.getElementById("Permukiman");
    if (w.style.display === "none",
        x.style.display === "none",
        y.style.display === "none",
        z.style.display === "none"
        ) {
        w.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
    } else {
        w.style.display = "none";
        x.style.display = "block";
        y.style.display = "block";
        z.style.display = "block";
    }
}

function Step2() {
    var w = document.getElementById("Enum");
    var x = document.getElementById("Lokasi");
    var y = document.getElementById("Keluarga");
    var z = document.getElementById("Permukiman");
    if (w.style.display === "none",
        x.style.display === "none",
        y.style.display === "none",
        z.style.display === "none"
        ) {
        w.style.display = "none";
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
    } else {
        w.style.display = "block";
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "block";
    }
}

function Step3() {
    var w = document.getElementById("Enum");
    var x = document.getElementById("Lokasi");
    var y = document.getElementById("Keluarga");
    var z = document.getElementById("Permukiman");
    if (w.style.display === "none",
        x.style.display === "none",
        y.style.display === "none",
        z.style.display === "none"
        ) {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
    }  
}
function Step4() {
    var w = document.getElementById("Enum");
    var x = document.getElementById("Lokasi");
    var y = document.getElementById("Keluarga");
    var z = document.getElementById("Permukiman");
    if (w.style.display === "none",
        x.style.display === "none",
        y.style.display === "none",
        z.style.display === "none"
        ) {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
    } else {
        w.style.display = "block";
        x.style.display = "block";
        y.style.display = "block";
        z.style.display = "none";
    }
}


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))