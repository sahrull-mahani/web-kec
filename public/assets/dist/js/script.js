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


// CHART
const dataAgama = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        hoverOffset: 5
    }]
}
const dataJob = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        hoverOffset: 5
    }]
}
const dataPend = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        hoverOffset: 5
    }]
}
const dataWedd = {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        hoverOffset: 5
    }]
}
const configAgama = {
    type: 'pie',
    data: dataAgama,
    options: {
        scales: {}
    }
}
const configJob = {
    type: 'pie',
    data: dataJob,
    options: {
        scales: {}
    }
}
const configPend = {
    type: 'pie',
    data: dataPend,
    options: {
        scales: {}
    }
}
const configWedd = {
    type: 'pie',
    data: dataWedd,
    options: {
        scales: {}
    }
}



const myAgamaChart = new Chart(
    $('#agama'),
    configAgama
)
const myJobChart = new Chart(
    $('#pekerjaan'),
    configJob
)
const myPendChart = new Chart(
    $('#pendidikan'),
    configPend
)
const myWeddChart = new Chart(
    $('#perkawinan'),
    configWedd
)

sendFilter(new Date().getFullYear())
$('#filter').on('change', function () {
    sendFilter(this.value)
})

function sendFilter(value) {
    $.post({
        url: location.origin + '/Statistik/api',
        data: { year: value },
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

            myAgamaChart.config.data.labels = agama
            myAgamaChart.config.data.datasets[0].data = totalAgama
            myAgamaChart.update()
            
            myJobChart.config.data.labels = pekerjaan
            myJobChart.config.data.datasets[0].data = totalPekerjaan
            myJobChart.config.type = 'bar'
            myJobChart.update()

            myPendChart.config.data.labels = pendidikan
            myPendChart.config.data.datasets[0].data = totalPendidikan
            myPendChart.update()

            myWeddChart.config.data.labels = perkawinan
            myWeddChart.config.data.datasets[0].data = totalPerkawinan
            myWeddChart.update()
        }
    })
}