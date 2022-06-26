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

$.get({
    url: location.origin + '/Statistik/api',
    success: function (res) {
        let data = $.parseJSON(res)

        var agama = [];
        var totalAgama = [];

        var pekerjaan = [];
        var totalPekerjaan = [];

        var pendidikan = [];
        var totalPendidikan = [];

        var perkawinan = [];
        var totalPerkawinan = [];
        $.each(data.statistikAgama, function (key, val) {
            agama.push(val.statistik)
            totalAgama.push(val.total)
        })
        $.each(data.statistikPekerjaan, function (key, val) {
            pekerjaan.push(val.statistik)
            totalPekerjaan.push(val.total)
        })
        $.each(data.statistikPendidikan, function (key, val) {
            pendidikan.push(val.statistik)
            totalPendidikan.push(val.total)
        })
        $.each(data.statistikPerkawinan, function (key, val) {
            perkawinan.push(val.statistik)
            totalPerkawinan.push(val.total)
        })
        
        

        new Chart($('#agama'), {
            type: 'pie',
            data: {
                labels: agama,
                datasets: [{
                    data: totalAgama,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            }
        })
        new Chart($('#pekerjaan'), {
            type: 'bar',
            data: {
                labels: pekerjaan,
                datasets: [{
                    label: 'Jumlah',
                    data: totalPekerjaan,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            }
        })
        new Chart($('#pendidikan'), {
            type: 'pie',
            data: {
                labels: pendidikan,
                datasets: [{
                    label: 'Jumlah',
                    data: totalPendidikan,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            }
        })
        new Chart($('#perkawinan'), {
            type: 'pie',
            data: {
                labels: perkawinan,
                datasets: [{
                    label: 'Jumlah',
                    data: totalPerkawinan,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 4
                }]
            }
        })

    }
})