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
    // document.getElementById("Lokasi").style.display='none';
    // document.getElementById("Keluarga").style.display='none';
    // document.getElementById("Permukiman").style.display='none';
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


$("#rowAdder").click(function () {
    newRowAdd =
    '<div id="baris">' +
    '<label for="sumber_penghasilan">Penghasilan Setahun Terakhir Dari (Rp)</label>' +
    '<div class="row">' +
    '<div class="form-group item col-md-10">' +
    '<select class="form-control select2" id="sumber_penghasilan" name="sumber_penghasilan[]" required />' +
    '<option value="">Sumber Penghasilan</option>' +
    '<option value="Padi">Padi</option>' +
    '<option value="Palawija (Jagung, Kacang-kacangan, Ubi-ubian, Dll)">Palawija (Jagung, Kacang-kacangan, Ubi-ubian, Dll)</option>' +
    '<option value="Hortikultura (Buah-buahan, Sayur-sayuran, Tanaman Hias, Tanaman Obat-obatan, Dll)">Hortikultura (Buah-buahan, Sayur-sayuran, Tanaman Hias, Tanaman Obat-obatan, Dll)</option>' +
    '<option value="Karet">Karet</option>' +
    '<option value="Kelapa Sawit">Kelapa Sawit</option>' +
    '<option value="Kopi">Kopi</option>' +
    '<option value="Kakao">Kakao</option>' +
    '<option value="Kelapa">Kelapa</option>' +
    '<option value="Lada">Lada</option>' +
    '<option value="Cengkeh">Cengkeh</option>' +
    '<option value="Tembakau">Tembakau</option>' +
    '<option value="Tebu">Tebu</option>' +
    '<option value="Sapi Potong">Sapi Potong</option>' +
    '<option value="Susu Sapi">Susu Sapi</option>' +
    '<option value="Domba">Domba</option>' +
    '<option value="Ternak Besar Lainnya (Kuda, Kerbau, Dll)">Ternak Besar Lainnya (Kuda, Kerbau, Dll)</option>' +
    '<option value="Ayam Pedaging">Ayam Pedaging</option>' +
    '<option value="Telur Ayam">Telur Ayam</option>' +
    '<option value="Ternak Kecil Lainnya (Bebek, Burung, Dll)">Ternak Kecil Lainnya (Bebek, Burung, Dll)</option>' +
    '<option value="Perikanan Tangkap (Termasuk Biota Lainnya)">Perikanan Tangkap (Termasuk Biota Lainnya)</option>' +
    '<option value="Perikanan Budidaya (Termasuk Biota Lainnya)">Perikanan Budidaya (Termasuk Biota Lainnya)</option>' +
    '<option value="Bambu">Bambu</option>' +
    '<option value="Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, Dll)">Budidaya Tanaman Kehutanan (Jati, Mahoni, Sengon, Dll)</option>' +
    '<option value="Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, Dll)">Pemungutan Hasil Hutan (Madu, Gaharu, Buah-buahan, Kayu Bakar, Rotan, Dll)</option>' +
    '<option value="Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, Dll)">Penangkapan Satwa Liar (Babi, Ayam Hutan, Kijang, Dll)</option>' +
    '<option value="Penangkaran Satwa Liar (Arwana, Buaya, Dll)">Penangkaran Satwa Liar (Arwana, Buaya, Dll)</option>' +
    '<option value="Jasa Pertanian (Sewa Traktor, Penggilingan, Dll)">Jasa Pertanian (Sewa Traktor, Penggilingan, Dll)</option>' +
    '<option value="Pertambangan dan Penggalian">Pertambangan dan Penggalian</option>' +
    '<option value="Industri Kerajinan">Industri Kerajinan</option>' +
    '<option value="Industri Pengolahan">Industri Pengolahan</option>' +
    '<option value="Perdagangan">Perdagangan</option>' +
    '<option value="Warung dan Rumah Makan">Warung dan Rumah Makan</option>' +
    '<option value="Angkutan">Angkutan</option>' +
    '<option value="Pergudangan">Pergudangan</option>' +
    '<option value="Komunikasi">Komunikasi</option>' +
    '<option value="Jasa Di Luar Pertanian">Jasa Di Luar Pertanian</option>' +
    '<option value="Karyawan Tetap">Karyawan Tetap</option>' +
    '<option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>' +
    '<option value="TNI">TNI</option>' +
    '<option value="PNS">PNS</option>' +
    '<option value="TKI Di Luar Negeri">TKI Di Luar Negeri</option>' +
    '<option value="Sumbangan (Dari Keluarga, Dari Pemerintah)">Sumbangan (Dari Keluarga, Dari Pemerintah)</option>' +
    '<option value="Lainnya">Lainnya</option>' +
    '</select>' +
    '</div>' +
    '<div class="form-group item col-md-2">' +
    '<input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah" required />' +
    '</div>' +
    '</div>' +
    '<div class="row">' +
    '<div class="form-group item col-md-3">' +
    '<select class="form-control select2" id="satuan" name="satuan[]" required />' +
    '<option value="">Satuan</option>' +
    '<option value="Batang">Batang</option>' +
    '<option value="Bulan">Bulan</option>' +
    '<option value="Ekor">Ekor</option>' +
    '<option value="Hari">Hari</option>' +
    '<option value="Kg">Kg</option>' +
    '<option value="Liter">Liter</option>' +
    '<option value="Ton">Ton</option>' +
    '</select>' +
    '</div>' +
    '<div class="form-group item col-md-4">' +
    '<input type="text" class="form-control" id="penghasilan" name="penghasilan[]" placeholder="Penghasilan Setahun (Rp)" required />' +
    '</div>' +
    '<div class="form-group item col-md-3">' +
    '<select class="form-control select2" id="ekspor" name="ekspor[]" required />' +
    '<option value="">Diekspor :</option>' +
    '<option value="Semua">Semua</option>' +
    '<option value="Sebagian Besar">Sebagian Besar</option>' +
    '<option value="Tidak">Tidak</option>' +
    '</select>' +
    '</div>' +
    '<div class="form-group item col-md-2">' +
    '<button class="btn btn-danger float-right" id="DeleteRow" type="button">' +
    '<i class="bi bi-Minus"></i> Hapus</button>' + 
    '</div>' +
    '</div>' +
    '</div>';

    $('#newinput').append(newRowAdd);
});

$("body").on("click", "#DeleteRow", function () {
    $(this).parents("#baris").remove();
})

$('#umur').on('change', function() {
    let val = $(this).val()

    $.ajax({
        url: location.origin + '/JumlahPenduduk/umur',
        type: 'POST',
        data: {value: val},
        success: function(res) {
            let data = $.parseJSON(res)
            $('#jumlah_pria').val(data.pria)
            $('#jumlah_wanita').val(data.wanita)
            $('#jumlah').val(data.wanita + data.pria)
        }
    })
})

$('#dusun').on('keyup', function() {
    let val = $(this).val()

    $.ajax({
        url: location.origin + '/JumlahPenduduk/dusun',
        type: 'POST',
        data: {value: val},
        success: function(res) {
            let data = $.parseJSON(res)
            $('#agama_islam').val(data.agama_islam)
            $('#agama_kristen').val(data.agama_kristen)
            $('#agama_katolik').val(data.agama_katolik)
            $('#agama_hindu').val(data.agama_hindu)
            $('#agama_budha').val(data.agama_budha)
            $('#jumlah_jiwa').val(data.jumlahJiwa)
            $('#jumlah_kk').val(data.jumlahKK)
            // $('#jumlah').val(data.wanita + data.pria)
        }
    })
})

$('#nik').on('change',function(){
    let val = $(this).val()
    let dusun = $('#dusun').val()

    $.ajax({
        url: location.origin + '/KeadaanPenduduk/keadaan',
        type: 'POST',
        data: {value: val, dusun: dusun},
        success: function(res){
            let data = $.parseJSON(res)
            if(res == 404){
                alert('NIK tidak ditemukan pada Dusun Ini')
            }else{
                $('#no_kk').val(data.data.no_kk)
                $('#nama').val(data.data.nama)
                $('#pekerjaan option[value="' + data.data.pekerjaan + '"]').prop('selected', true);
                $('#muntaber_diare option[value="' + data.data.muntaber_diare + '"]').prop('selected', true);
            }
        }
    })
})

$('#nik_pajak').on('change',function(){
    let val = $(this).val()

    $.ajax({
        url: location.origin + '/DataPajak/pajak',
        type: 'POST',
        data: {value: val},
        success: function(res){
            let data = $.parseJSON(res)
            if(res == 404){
                alert('NIK tidak ditemukan')
            }else{
                $('#no_kk').val(data.data.no_kk)
                $('#nama').val(data.data.nama)
                $('#alamat').val(data.data.alamat)
                $('#jumlah').val(data.data.jumlah_pajak)
                $('#wajib_pajak option[value="' + data.data.wajib_pajak + '"]').prop('selected', true);
                $('#keterangan option[value="' + data.data.keterangan + '"]').prop('selected', true);
            }
        }
    })
})



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
// .then(response => response.json())
// .then(provinces => console.log(provinces));

$(document).ready(function(){
    let valProv = $('#provinsi').val()
    let valKab = $('#kabupaten').val()
    let idKab = $('#kabupaten').data('kabupaten')
    if (valProv !== null) {
        $.ajax({
            type:'POST',
            url:"/RumahTangga/getKab",
            dataType: "JSON",
            data: {
                id_provinsi : valProv,
            },
            success:function(response){
                var output = `<option value="" disabled>-- pilih --</option>`
                $.each(response, function(i, val) {
                    output += `<option value="${val.split('|')[1]}" ${idKab == val.split('|')[0] ? 'selected' : ''}>${val.split('|')[1]}</option>`
                })
                console.log(output)
                let coba = $('#kabupaten').html(output);
                // let valKABB = $('#kabupaten').children().val()
            }
        });
    }
    $('#provinsi').change(function(){
        var id_provinsi = $(this).val();
//         $kabupaten =fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id_provinsi}.json`)
// .then(response => response.json())
// .then(regencies => console.log(regencies));
        $.ajax({
            type:'POST',
            url:"/RumahTangga/getKab",
            dataType: "JSON",
            data: {
                id_provinsi : id_provinsi,
            },
            success:function(response){
                var hasilKab = `<option value="" disabled>-- pilih --</option>`
                $.each(response, function(i, val) {
                    hasilKab += `<option value="${val.split('|')[1]}" ${idKab == val.split('|')[0] ? 'selected' : ''}>${val.split('|')[1]}</option>`
                })
                $('#kabupaten').html(hasilKab);
                // console.log(response);
            }
        });
        // var hasilKab = `<option value="" disabled>-- pilih --</option>`
        // $.each(regencies, function(i, val) {
        //     hasilKab += `<option value="${val.split('|')[1]}" ${idKab == val.split('|')[0] ? 'selected' : ''}>${val.split('|')[1]}</option>`
        // })
        // $('#kabupaten').html(hasilKab);

    });

    $('#kabupaten').change(function(){
        var id_kabupaten = $(this).val();
        $.ajax({
            type:'POST',
            url:"/RumahTangga/getKec",
            dataType: "JSON",
            data: {
                id_kabupaten : id_kabupaten,
            },
            success:function(response){
                $('#kecamatan').html(response);
                // console.log(response);
            }
        });

    });

    $('#kecamatan').change(function(){
        var id_kecamatan = $(this).val();
        $.ajax({
            type:'POST',
            url:"/RumahTangga/getDesa",
            dataType: "JSON",
            data: {
                id_kecamatan : id_kecamatan,
            },
            success:function(response){
                $('#desa').html(response);
                // console.log(response);
            }
        });

    });
    
});