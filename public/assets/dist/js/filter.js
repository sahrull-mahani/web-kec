
var d = new Date($.now())
var rangeDateJP = $('#range-dateJP')
var filter_desa = $('#filter_desa')
var strDate = ("0" + (d.getMonth() + 1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2) + "-" + d.getFullYear()

function rangeDateFilter(start, end) {
    $("#range-dateJP span").html(start.format("DD-MMM-YYYY") + " sampai " + end.format("DD-MMM-YYYY"))
}

rangeDateJP.daterangepicker(
    {
        ranges: {
            "Hari Ini": [moment(), moment()],
            Kemarin: [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "7 Hari Terakhir": [moment().subtract(6, "days"), moment()],
            "30 Hari Terakhir": [moment().subtract(29, "days"), moment()],
            "Bulan Ini": [moment().startOf("month"), moment().endOf("month")],
            "Bulan Kemarin": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
            ],
        },
        alwaysShowCalendars: true,
        showDropdowns: false,
        autoUpdateInput: true,
        minYear: 2022,
        maxYear: 2022,
        maxDate: strDate,
        buttonClasses: "btn btn-xs",
        locale: {
            customRangeLabel: "Jangka Waktu Yang Dipilih",
            cancelLabel: "Batal",
            applyLabel: "Filter",
            fromLabel: "Dari",
            toLabel: "Sampai",
            daysOfWeek: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
        },
    },
    rangeDateFilter
);  
rangeDateJP.on("cancel.daterangepicker", function (ev, picker) {
    //do something, like clearing an input
    rangeDateJP.html(
        '<i class="fa fa-calendar mr-1"></i> <span>Filter</span> <i class="ml-3 fa fa-caret-down"></i>'
    );
    $(this).data("daterangepicker").setStartDate(moment().format("MM-DD-YYYY"));
    $(this).data("daterangepicker").setEndDate(moment().format("MM-DD-YYYY"));
});

$('#export-excel').on('click', function () {
    let filter_desa = $('#filter_desa').val()
    let start = rangeDateJP.val().split(' - ')[0]
    let end = rangeDateJP.val().split(' - ')[1]

    let startConvert = new Date(Date.parse(start, 'YYYY-mm-dd')).toISOString().split('T')[0]
    let endConvert = new Date(Date.parse(end, 'YYYY-mm-dd')).toISOString().split('T')[0]
    swin = window.location(location.origin + '/Laporan/export' + `${filter_desa}/${startConvert}/${endConvert}`, 'win', 'scrollbars,width=1000,height=600,top=80,left=140,status=yes,toolbar=no,menubar=yes,location=no');
    swin.focus()
})

