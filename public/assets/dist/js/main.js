$(document).ready(function () {
    var token = $('.csrf-token').val()
    var csrf_hash = $('.csrf-hash').val()
    var ace = {}
    ace[token] = csrf_hash
    $.ajaxSetup({ data: ace })
})

var $table = $('#table')
var $remove = $('#remove')
var $edit = $('#edit')
var $single = $('#single-edit')
var $restore = $('#restore')
var $publish = $('#publish')
var $detail = $('#detail')
var url = $('#url').val()
function ajaxRequest(params) {
    $.get(url + 'ajax_request?' + $.param(params.data)).then(function (res) {
        params.success(JSON.parse(res))
    })
}

function cetak_dh(url) {
    var url = url + '/' + $('#pegawai').val() + '/' + $('#bulan').val();
    swin = window.open(url, 'win', 'scrollbars,width=1000,height=600,top=80,left=140,status=yes,toolbar=no,menubar=yes,location=no');
    swin.focus();
}
function activate(url, a) {
    if (a == 1) {
        var t_title = "Non Aktifkan..?";
        var pesan = "Anda yakin? User akan dinonaktifkan!";
        var button = "Non Aktifkan";
        var warna = "#DD6B55";
    } else {
        var t_title = "Aktifkan..?";
        var pesan = "Anda yakin? User akan diaktifkan!";
        var button = "Aktifkan";
        var warna = "#00A65A";
    }
    Swal.fire({
        title: t_title,
        text: pesan,
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: button,
        denyButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    var data = $.parseJSON(response);
                    Swal.fire({ title: data.title, html: data.text, icon: data.type }).then((result) => {
                        $('#table').bootstrapTable('refresh');
                    });
                }, error: function (jqXHR, exception, thrownError) {
                    ajax_error_handling(jqXHR, exception, thrownError);
                }
            })
        }
    })
}
$('#save-profile').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        // data: new FormData(this),
        // processData:false,
        // contentType:false,
        // cache:false,
        // async:false,
        success: function (response) {
            var data = $.parseJSON(response);
            // Swal.fire({title:data.title,html:data.text,type:data.type}).then((result) => {
            //     var url = window.location.href;     // Returns full URL
            //     window.location.replace(url);
            // })
            Lobibox.notify(data.type, {
                position: 'top right',
                msg: data.text,
                icon: data.type
            })
            window.location.replace(window.location.href)
        }, error: function (jqXHR, exception, thrownError) {
            ajax_error_handling(jqXHR, exception, thrownError);
        }
    });
});
$('#save-account').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("action"),
        type: 'post',
        data: $(this).serialize(),
        success: function (response) {
            var data = $.parseJSON(response);
            Swal.fire({ title: data.title, html: data.text, type: data.type }).then((result) => {
                var url = window.location.href;     // Returns full URL
                window.location.replace(window.location.href)
            });
            // Lobibox.notify(data.type, {
            //     position: 'top right',
            //     msg: data.text,
            //     icon: data.type
            // })
            // window.location.replace(window.location.href)
        }, error: function (jqXHR, exception, thrownError) {
            ajax_error_handling(jqXHR, exception, thrownError)
        }
    });
});
function ajax_error_handling(jqXHR, exception, thrownError) {
    Swal.fire({ title: "Error code" + jqXHR.status, html: thrownError + ", " + exception, icon: "error" }).then(function () {
        $("#spinner").hide();
    });
}
function readFile(url) {
    swin = window.open(url, 'win', 'scrollbars,width=1000,height=600,top=80,left=140,status=yes,toolbar=no,menubar=yes,location=no');
    swin.focus();
}
(function ($) {
    'use strict'
    var $table = $('#table');
    $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('destroy').bootstrapTable({
            exportDataType: $(this).val()
        });
    });
    $(document).bind("ajaxSend", function () {
        $("#spinner").show();
    }).bind("ajaxStop", function () {
        $("#spinner").hide();
    });
    $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
        if ($table.bootstrapTable('getSelections').length > 1) {
            $single.attr('disabled', true)
            $detail.attr('disabled', true)
        } else {
            $single.prop('disabled', !$table.bootstrapTable('getSelections').length)
            $detail.prop('disabled', !$table.bootstrapTable('getSelections').length)
        }
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
        $publish.prop('disabled', !$table.bootstrapTable('getSelections').length)
        $edit.prop('disabled', !$table.bootstrapTable('getSelections').length)
        $restore.prop('disabled', !$table.bootstrapTable('getSelections').length)
    })
    $('.create').bind('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: url + $(this).attr('method'),
            type: 'POST',
            data: {
                num_of_row: $('#number-of-row').val()
            },
            dataType: "html",
            success: function (response) {
                var data = $.parseJSON(response);
                $('#modal_content').modal('show')
                $('#modal_content').modal({
                    backdrop: 'static'
                })
                $('.isi-modal').html(data.html)
                $('.modal-title').html(data.modal_title)
                $('#modal-size').addClass(data.modal_size)
            },
            error: function (jqXHR, exception, thrownError) {
                ajax_error_handling(jqXHR, exception, thrownError);
            }
        });
    });
    $edit.bind('click', function (e) {
        e.stopImmediatePropagation();
        var ids = JSON.stringify($table.bootstrapTable('getSelections'))
        var a = JSON.parse(ids);
        $('#modal_content').modal('show')
        $.ajax({
            url: url + $(this).attr('method'),
            type: 'POST',
            data: { id: a[0].id, status: a[0].status },
            dataType: "html",
            success: function (response) {
                var data = $.parseJSON(response);
                $('#modal_content').modal({
                    backdrop: 'static'
                })
                $('.isi-modal').html(data.html)
                $('.modal-title').html(data.modal_title)
                $('#modal-size').addClass(data.modal_size)
            },
            error: function (jqXHR, exception, thrownError) {
                ajax_error_handling(jqXHR, exception, thrownError);
            }
        })
        // var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
        //     return row.id
        // })
        // $.ajax({
        //     url: url + $(this).attr('method'),
        //     type: 'POST',
        //     data: {
        //         id: ids
        //     },
        //     dataType: "html",
        //     success: function (response) {
        //         var data = $.parseJSON(response);
        //         $('#modal_content').modal('show')
        //         $('#modal_content').modal({
        //             backdrop: 'static'
        //         })
        //         $('.isi-modal').html(data.html)
        //         $('.modal-title').html(data.modal_title)
        //         $('#modal-size').addClass(data.modal_size)
        //     },
        //     error: function (jqXHR, exception, thrownError) {
        //         ajax_error_handling(jqXHR, exception, thrownError);
        //     }
        // });
    });
    $detail.bind('click', function (e) {
        e.stopImmediatePropagation();
        var ids = JSON.stringify($table.bootstrapTable('getSelections'))
        var a = JSON.parse(ids);
        $('#modal_content').modal('show')
        $.ajax({
            url: url + $(this).attr('method'),
            type: 'POST',
            data: { id: a[0].id, status: a[0].status },
            dataType: "html",
            success: function (response) {
                var data = $.parseJSON(response);
                $('#modal_content').modal({
                    backdrop: 'static'
                })
                $('.isi-modal').html(data.html)
                $('.modal-title').html(data.modal_title)
                $('#modal-size').addClass(data.modal_size)
            },
            error: function (jqXHR, exception, thrownError) {
                ajax_error_handling(jqXHR, exception, thrownError);
            }
        })
        // var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
        //     return row.id
        // })
        // $.ajax({
        //     url: url + $(this).attr('method'),
        //     type: 'POST',
        //     data: {
        //         id: ids,
        //     },
        //     dataType: "html",
        //     success: function (response) {
        //         var data = $.parseJSON(response);
        //         $('#modal_content').modal('show')
        //         $('#modal_content').modal({
        //             backdrop: 'static'
        //         })
        //         $('.isi-modal').html(data.html)
        //         $('.modal-title').html(data.modal_title)
        //         $('#modal-size').addClass(data.modal_size)
        //     },
        //     error: function (jqXHR, exception, thrownError) {
        //         ajax_error_handling(jqXHR, exception, thrownError);
        //     }
        // });
    });
    $remove.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
        var name = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.nama
        })
        Lobibox.confirm({
            msg: 'Anda Yakin Akan Menghapus Data ' + ids + ' ?',
            buttons: {
                yes: { 'class': 'btn btn-success', text: 'Ya' }, no: { 'class': 'btn btn-danger', text: 'Tidak' }
            }, callback: function (lolibox, type) {
                if (type === 'yes') {
                    $.ajax({
                        url: url + 'save',
                        type: 'post',
                        data: {
                            id: ids,
                            action: 'delete'
                        },
                        success: function (response) {
                            var data = $.parseJSON(response);
                            Lobibox.notify(data.type, {
                                position: 'top right',
                                msg: data.text
                            });
                            $('#table').bootstrapTable('refresh');
                            $remove.attr('disabled', true)
                        }, error: function (jqXHR, exception, thrownError) {
                            ajax_error_handling(jqXHR, exception, thrownError);
                        }
                    });
                } else { $remove.prop('disabled', true) }
            }
        });
    })
    $publish.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
        var name = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.judul
        })
        Lobibox.confirm({
            msg: 'Anda Yakin Akan Mengubah Data ' + name + ' ?',
            buttons: {
                yes: { 'class': 'btn btn-success', text: 'Ya' }, no: { 'class': 'btn btn-danger', text: 'Tidak' }
            }, callback: function (lolibox, type) {
                if (type === 'yes') {
                    $.ajax({
                        url: url + 'save',
                        type: 'post',
                        data: {
                            id: ids,
                            action: 'publish'
                        },
                        success: function (response) {
                            var data = $.parseJSON(response)
                            console.log(data)
                            if (data.type == "success") {
                                Lobibox.notify(data.type, {
                                    position: 'top right',
                                    msg: data.text
                                })
                            } else {
                                $.each(data.text, function (i, val) {
                                    Lobibox.notify(data.type, {
                                        position: 'top right',
                                        msg: i + ' : ' + val
                                    })
                                })
                            }
                            $('#table').bootstrapTable('refresh');
                        }, error: function (jqXHR, exception, thrownError) {
                            ajax_error_handling(jqXHR, exception, thrownError);
                        }
                    });
                } else { $remove.prop('disabled', true) }
            }
        });
    })
    $restore.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
        var name = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.nama
        })
        Lobibox.confirm({
            msg: 'Anda Yakin Akan Mengembalikan Data ' + name + '?',
            buttons: {
                yes: { 'class': 'btn btn-success', text: 'Ya' }, no: { 'class': 'btn btn-danger', text: 'Tidak' }
            }, callback: function (Lobibox, type) {
                if (type === 'yes') {
                    $.ajax({
                        url: url + 'save',
                        type: 'post',
                        data: {
                            id: ids,
                            action: 'restore'
                        },
                        success: function (response) {
                            var data = $.parseJSON(response);
                            Lobibox.notify(data.type, {
                                position: 'top right',
                                msg: data.text
                            });
                            $('#table').bootstrapTable('refresh');
                        }, error: function (jqXHR, exception, thrownError) {
                            ajax_error_handling(jqXHR, exception, thrownError);
                        }
                    });
                } else { $remove.prop('disabled', true) }
            }
        });
    })
    $("#proses-presensi").click(function () {
        var bulan = $("#bulan").val();
        if (bulan == '') {
            swal.fire({
                title: "Warning",
                text: "Pilih Bulan Terlebih Dahulu",
                icon: "warning"
            })
        } else {
            Swal.fire({
                title: 'Proses Data?',
                text: "Anda Akan Memproses Presensi Bulan " + getBulan(bulan),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Proses it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + 'save',
                        type: 'post',
                        data: {
                            bulan: bulan,
                            action: 'insert'
                        },
                        success: function (response) {
                            var data = $.parseJSON(response);
                            Lobibox.notify(data.type, {
                                position: 'top right',
                                msg: data.text,
                                icon: data.type
                            });
                            $('#table').bootstrapTable('refresh');
                        }, error: function (jqXHR, exception, thrownError) {
                            ajax_error_handling(jqXHR, exception, thrownError);
                        }
                    });
                }
            })
        }
    })
    $('.close-modal').bind('click', function (e) {
        e.preventDefault();
        $('#modal_content').modal('hide');
    });
    $('.close').bind('click', function (e) {
        e.preventDefault();
        $('#modal_content').modal('hide');
    });
    $single.bind('click', function (e) {
        e.stopImmediatePropagation();
        var ids = JSON.stringify($table.bootstrapTable('getSelections'))
        var a = JSON.parse(ids);
        let id = a[0].id
        document.location.href = location.origin + '/individu/single_edit/' + id
        // $.ajax({
        //     url : location.origin + '/individu/single_edit/',
        //     type: 'POST',
        //     data: {id: ids},
        //     success: function(res) {
        //         document.location.href = location.origin + '/individu/single_edit/'
        //     }
        // })
        // $('#modal_content').modal('show')
        // $.ajax({
        //     url: url + $(this).attr('method'),
        //     type: 'POST',
        //     data: { id: a[0].id, status: a[0].status },
        //     dataType: "html",
        //     success: function (response) {
        //         var data = $.parseJSON(response);
        //         $('#modal_content').modal({
        //             backdrop: 'static'
        //         })
        //         $('.isi-modal').html(data.html)
        //         $('.modal-title').html(data.modal_title)
        //         $('#modal-size').addClass(data.modal_size)
        //     },
        //     error: function (jqXHR, exception, thrownError) {
        //         ajax_error_handling(jqXHR, exception, thrownError);
        //     }
        // })
    })
    $('form').on('blur', 'input[required], input.optional, select.required', validator.checkField).on('change', 'select.required', validator.checkField).on('keypress', 'input[required][pattern]', validator.keypress);
    $('.multi.required').on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    })
    $('.form-post-save').submit(function (e) {
        e.preventDefault();
        $('.btn-sub').toggleClass('d-none')
        $('.btn-load').toggleClass('d-none')
        if (!validator.checkAll($(this))) {
            return false;
        } else {
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if (data.type == "success") {
                        Swal.fire({ title: data.title, html: data.text, icon: data.type }).then((result) => {
                            if (result.isConfirmed)
                                $('.btn-sub').toggleClass('d-none')
                            $('.btn-load').toggleClass('d-none')
                            window.location.replace(location.origin + `/${data.redirect}`)
                        })
                    } else {
                        $('.btn-sub').toggleClass('d-none')
                        $('.btn-load').toggleClass('d-none')
                        $.each(data.text, function (key, val) {
                            Lobibox.notify(data.type, {
                                position: 'top right',
                                msg: `${key} : ${val}`,
                                icon: data.type
                            })
                        })
                        $('#spinner').hide();
                    }
                },
                error: function (jqXHR, exception, thrownError) {
                    $('.btn-sub').toggleClass('d-none')
                    $('.btn-load').toggleClass('d-none')
                    Swal.fire({
                        title: 'Error code' + jqXHR.status,
                        html: thrownError + ', ' + exception,
                        type: 'error'
                    }).then((result) => {
                        $('#spinner').hide();
                    });
                }
            });
        }
    });
    //   setTimeout(function () {
    //     if (window.___browserSync___ === undefined && Number(localStorage.getItem('AdminLTE:Demo:MessageShowed')) < Date.now()) {
    //       localStorage.setItem('AdminLTE:Demo:MessageShowed', (Date.now()) + (15 * 60 * 1000))
    //       // eslint-disable-next-line no-alert
    //       alert('You load AdminLTE\'s "demo.js", \nthis file is only created for testing purposes!')
    //     }
    //   }, 1000)

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1)
    }

    function createSkinBlock(colors, callback, noneSelected) {
        var $block = $('<select />', {
            class: noneSelected ? 'custom-select mb-3 border-0' : 'custom-select mb-3 text-light border-0 ' + colors[0].replace(/accent-|navbar-/, 'bg-')
        })

        if (noneSelected) {
            var $default = $('<option />', {
                text: 'None Selected'
            })

            $block.append($default)
        }

        colors.forEach(function (color) {
            var $color = $('<option />', {
                class: (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-'),
                text: capitalizeFirstLetter((typeof color === 'object' ? color.join(' ') : color).replace(/navbar-|accent-|bg-/, '').replace('-', ' '))
            })

            $block.append($color)
        })
        if (callback) {
            $block.on('change', callback)
        }

        return $block
    }

    var $sidebar = $('.control-sidebar')
    var $container = $('<div />', {
        class: 'p-3 control-sidebar-content'
    })

    $sidebar.append($container)

    // Checkboxes

    $container.append(
        '<h5>Customize AdminLTE</h5><hr class="mb-2"/>'
    )

    var $dark_mode_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('dark-mode'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('dark-mode')
        } else {
            $('body').removeClass('dark-mode')
        }
    })
    var $dark_mode_container = $('<div />', { class: 'mb-4' }).append($dark_mode_checkbox).append('<span>Dark Mode</span>')
    $container.append($dark_mode_container)

    $container.append('<h6>Header Options</h6>')
    var $header_fixed_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-navbar-fixed'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('layout-navbar-fixed')
        } else {
            $('body').removeClass('layout-navbar-fixed')
        }
    })
    var $header_fixed_container = $('<div />', { class: 'mb-1' }).append($header_fixed_checkbox).append('<span>Fixed</span>')
    $container.append($header_fixed_container)

    var $dropdown_legacy_offset_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('dropdown-legacy'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('dropdown-legacy')
        } else {
            $('.main-header').removeClass('dropdown-legacy')
        }
    })
    var $dropdown_legacy_offset_container = $('<div />', { class: 'mb-1' }).append($dropdown_legacy_offset_checkbox).append('<span>Dropdown Legacy Offset</span>')
    $container.append($dropdown_legacy_offset_container)

    var $no_border_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('border-bottom-0'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('border-bottom-0')
        } else {
            $('.main-header').removeClass('border-bottom-0')
        }
    })
    var $no_border_container = $('<div />', { class: 'mb-4' }).append($no_border_checkbox).append('<span>No border</span>')
    $container.append($no_border_container)

    $container.append('<h6>Sidebar Options</h6>')

    var $sidebar_collapsed_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('sidebar-collapse'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('sidebar-collapse')
            $(window).trigger('resize')
        } else {
            $('body').removeClass('sidebar-collapse')
            $(window).trigger('resize')
        }
    })
    var $sidebar_collapsed_container = $('<div />', { class: 'mb-1' }).append($sidebar_collapsed_checkbox).append('<span>Collapsed</span>')
    $container.append($sidebar_collapsed_container)

    $(document).on('collapsed.lte.pushmenu', '[data-widget="pushmenu"]', function () {
        $sidebar_collapsed_checkbox.prop('checked', true)
    })
    $(document).on('shown.lte.pushmenu', '[data-widget="pushmenu"]', function () {
        $sidebar_collapsed_checkbox.prop('checked', false)
    })

    var $sidebar_fixed_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-fixed'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('layout-fixed')
            $(window).trigger('resize')
        } else {
            $('body').removeClass('layout-fixed')
            $(window).trigger('resize')
        }
    })
    var $sidebar_fixed_container = $('<div />', { class: 'mb-1' }).append($sidebar_fixed_checkbox).append('<span>Fixed</span>')
    $container.append($sidebar_fixed_container)

    var $sidebar_mini_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('sidebar-mini'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('sidebar-mini')
        } else {
            $('body').removeClass('sidebar-mini')
        }
    })
    var $sidebar_mini_container = $('<div />', { class: 'mb-1' }).append($sidebar_mini_checkbox).append('<span>Sidebar Mini</span>')
    $container.append($sidebar_mini_container)

    var $sidebar_mini_md_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('sidebar-mini-md'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('sidebar-mini-md')
        } else {
            $('body').removeClass('sidebar-mini-md')
        }
    })
    var $sidebar_mini_md_container = $('<div />', { class: 'mb-1' }).append($sidebar_mini_md_checkbox).append('<span>Sidebar Mini MD</span>')
    $container.append($sidebar_mini_md_container)

    var $sidebar_mini_xs_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('sidebar-mini-xs'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('sidebar-mini-xs')
        } else {
            $('body').removeClass('sidebar-mini-xs')
        }
    })
    var $sidebar_mini_xs_container = $('<div />', { class: 'mb-1' }).append($sidebar_mini_xs_checkbox).append('<span>Sidebar Mini XS</span>')
    $container.append($sidebar_mini_xs_container)

    var $flat_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-flat'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-flat')
        } else {
            $('.nav-sidebar').removeClass('nav-flat')
        }
    })
    var $flat_sidebar_container = $('<div />', { class: 'mb-1' }).append($flat_sidebar_checkbox).append('<span>Nav Flat Style</span>')
    $container.append($flat_sidebar_container)

    var $legacy_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-legacy'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-legacy')
        } else {
            $('.nav-sidebar').removeClass('nav-legacy')
        }
    })
    var $legacy_sidebar_container = $('<div />', { class: 'mb-1' }).append($legacy_sidebar_checkbox).append('<span>Nav Legacy Style</span>')
    $container.append($legacy_sidebar_container)

    var $compact_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-compact'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-compact')
        } else {
            $('.nav-sidebar').removeClass('nav-compact')
        }
    })
    var $compact_sidebar_container = $('<div />', { class: 'mb-1' }).append($compact_sidebar_checkbox).append('<span>Nav Compact</span>')
    $container.append($compact_sidebar_container)

    var $child_indent_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-child-indent'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-child-indent')
        } else {
            $('.nav-sidebar').removeClass('nav-child-indent')
        }
    })
    var $child_indent_sidebar_container = $('<div />', { class: 'mb-1' }).append($child_indent_sidebar_checkbox).append('<span>Nav Child Indent</span>')
    $container.append($child_indent_sidebar_container)

    var $child_hide_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('nav-collapse-hide-child'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('nav-collapse-hide-child')
        } else {
            $('.nav-sidebar').removeClass('nav-collapse-hide-child')
        }
    })
    var $child_hide_sidebar_container = $('<div />', { class: 'mb-1' }).append($child_hide_sidebar_checkbox).append('<span>Nav Child Hide on Collapse</span>')
    $container.append($child_hide_sidebar_container)

    var $no_expand_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-sidebar').addClass('sidebar-no-expand')
        } else {
            $('.main-sidebar').removeClass('sidebar-no-expand')
        }
    })
    var $no_expand_sidebar_container = $('<div />', { class: 'mb-4' }).append($no_expand_sidebar_checkbox).append('<span>Disable Hover/Focus Auto-Expand</span>')
    $container.append($no_expand_sidebar_container)

    $container.append('<h6>Footer Options</h6>')
    var $footer_fixed_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('layout-footer-fixed'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('layout-footer-fixed')
        } else {
            $('body').removeClass('layout-footer-fixed')
        }
    })
    var $footer_fixed_container = $('<div />', { class: 'mb-4' }).append($footer_fixed_checkbox).append('<span>Fixed</span>')
    $container.append($footer_fixed_container)

    $container.append('<h6>Small Text Options</h6>')

    var $text_sm_body_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('body').hasClass('text-sm'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('body').addClass('text-sm')
        } else {
            $('body').removeClass('text-sm')
        }
    })
    var $text_sm_body_container = $('<div />', { class: 'mb-1' }).append($text_sm_body_checkbox).append('<span>Body</span>')
    $container.append($text_sm_body_container)

    var $text_sm_header_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('text-sm'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('text-sm')
        } else {
            $('.main-header').removeClass('text-sm')
        }
    })
    var $text_sm_header_container = $('<div />', { class: 'mb-1' }).append($text_sm_header_checkbox).append('<span>Navbar</span>')
    $container.append($text_sm_header_container)

    var $text_sm_brand_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.brand-link').hasClass('text-sm'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.brand-link').addClass('text-sm')
        } else {
            $('.brand-link').removeClass('text-sm')
        }
    })
    var $text_sm_brand_container = $('<div />', { class: 'mb-1' }).append($text_sm_brand_checkbox).append('<span>Brand</span>')
    $container.append($text_sm_brand_container)

    var $text_sm_sidebar_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.nav-sidebar').hasClass('text-sm'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.nav-sidebar').addClass('text-sm')
        } else {
            $('.nav-sidebar').removeClass('text-sm')
        }
    })
    var $text_sm_sidebar_container = $('<div />', { class: 'mb-1' }).append($text_sm_sidebar_checkbox).append('<span>Sidebar Nav</span>')
    $container.append($text_sm_sidebar_container)

    var $text_sm_footer_checkbox = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-footer').hasClass('text-sm'),
        class: 'mr-1'
    }).on('click', function () {
        if ($(this).is(':checked')) {
            $('.main-footer').addClass('text-sm')
        } else {
            $('.main-footer').removeClass('text-sm')
        }
    })
    var $text_sm_footer_container = $('<div />', { class: 'mb-4' }).append($text_sm_footer_checkbox).append('<span>Footer</span>')
    $container.append($text_sm_footer_container)

    // Color Arrays

    var navbar_dark_skins = [
        'navbar-primary',
        'navbar-secondary',
        'navbar-info',
        'navbar-success',
        'navbar-danger',
        'navbar-indigo',
        'navbar-purple',
        'navbar-pink',
        'navbar-navy',
        'navbar-lightblue',
        'navbar-teal',
        'navbar-cyan',
        'navbar-dark',
        'navbar-gray-dark',
        'navbar-gray'
    ]

    var navbar_light_skins = [
        'navbar-light',
        'navbar-warning',
        'navbar-white',
        'navbar-orange'
    ]

    var sidebar_colors = [
        'bg-primary',
        'bg-warning',
        'bg-info',
        'bg-danger',
        'bg-success',
        'bg-indigo',
        'bg-lightblue',
        'bg-navy',
        'bg-purple',
        'bg-fuchsia',
        'bg-pink',
        'bg-maroon',
        'bg-orange',
        'bg-lime',
        'bg-teal',
        'bg-olive'
    ]

    var accent_colors = [
        'accent-primary',
        'accent-warning',
        'accent-info',
        'accent-danger',
        'accent-success',
        'accent-indigo',
        'accent-lightblue',
        'accent-navy',
        'accent-purple',
        'accent-fuchsia',
        'accent-pink',
        'accent-maroon',
        'accent-orange',
        'accent-lime',
        'accent-teal',
        'accent-olive'
    ]

    var sidebar_skins = [
        'sidebar-dark-primary',
        'sidebar-dark-warning',
        'sidebar-dark-info',
        'sidebar-dark-danger',
        'sidebar-dark-success',
        'sidebar-dark-indigo',
        'sidebar-dark-lightblue',
        'sidebar-dark-navy',
        'sidebar-dark-purple',
        'sidebar-dark-fuchsia',
        'sidebar-dark-pink',
        'sidebar-dark-maroon',
        'sidebar-dark-orange',
        'sidebar-dark-lime',
        'sidebar-dark-teal',
        'sidebar-dark-olive',
        'sidebar-light-primary',
        'sidebar-light-warning',
        'sidebar-light-info',
        'sidebar-light-danger',
        'sidebar-light-success',
        'sidebar-light-indigo',
        'sidebar-light-lightblue',
        'sidebar-light-navy',
        'sidebar-light-purple',
        'sidebar-light-fuchsia',
        'sidebar-light-pink',
        'sidebar-light-maroon',
        'sidebar-light-orange',
        'sidebar-light-lime',
        'sidebar-light-teal',
        'sidebar-light-olive'
    ]

    // Navbar Variants

    $container.append('<h6>Navbar Variants</h6>')

    var $navbar_variants = $('<div />', {
        class: 'd-flex'
    })
    var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins)
    var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function () {
        var color = $(this).find('option:selected').attr('class').replace('bg-', 'navbar-')
        var $main_header = $('.main-header')
        $main_header.removeClass('navbar-dark').removeClass('navbar-light')
        navbar_all_colors.forEach(function (color) {
            $main_header.removeClass(color)
        })

        $(this).removeClass().addClass('custom-select mb-3 text-light border-0 ')

        if (navbar_dark_skins.indexOf(color) > -1) {
            $main_header.addClass('navbar-dark')
            $(this).addClass(color).addClass('text-light')
        } else {
            $main_header.addClass('navbar-light')
            $(this).addClass(color)
        }

        $main_header.addClass(color)
    })

    var active_navbar_color = null
    $('.main-header')[0].classList.forEach(function (className) {
        if (navbar_all_colors.indexOf(className) > -1 && active_navbar_color === null) {
            active_navbar_color = className.replace('navbar-', 'bg-')
        }
    })

    $navbar_variants_colors.find('option.' + active_navbar_color).prop('selected', true)
    $navbar_variants_colors.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_navbar_color)

    $navbar_variants.append($navbar_variants_colors)

    $container.append($navbar_variants)

    // Sidebar Colors

    $container.append('<h6>Accent Color Variants</h6>')
    var $accent_variants = $('<div />', {
        class: 'd-flex'
    })
    $container.append($accent_variants)
    $container.append(createSkinBlock(accent_colors, function () {
        var color = $(this).find('option:selected').attr('class')
        var $body = $('body')
        accent_colors.forEach(function (skin) {
            $body.removeClass(skin)
        })

        var accent_color_class = color.replace('bg-', 'accent-')

        $body.addClass(accent_color_class)
    }, true))

    var active_accent_color = null
    $('body')[0].classList.forEach(function (className) {
        if (accent_colors.indexOf(className) > -1 && active_accent_color === null) {
            active_accent_color = className.replace('navbar-', 'bg-')
        }
    })

    // $accent_variants.find('option.' + active_accent_color).prop('selected', true)
    // $accent_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_accent_color)

    $container.append('<h6>Dark Sidebar Variants</h6>')
    var $sidebar_variants_dark = $('<div />', {
        class: 'd-flex'
    })
    $container.append($sidebar_variants_dark)
    var $sidebar_dark_variants = createSkinBlock(sidebar_colors, function () {
        var color = $(this).find('option:selected').attr('class')
        var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        sidebar_skins.forEach(function (skin) {
            $sidebar.removeClass(skin)
            $sidebar_light_variants.removeClass(skin.replace('sidebar-dark-', 'bg-')).removeClass('text-light')
        })

        $(this).removeClass().addClass('custom-select mb-3 text-light border-0').addClass(color)

        $sidebar_light_variants.find('option').prop('selected', false)
        $sidebar.addClass(sidebar_class)
        $('.sidebar').removeClass('os-theme-dark').addClass('os-theme-light')
    }, true)
    $container.append($sidebar_dark_variants)

    var active_sidebar_dark_color = null
    $('.main-sidebar')[0].classList.forEach(function (className) {
        var color = className.replace('sidebar-dark-', 'bg-')
        if (sidebar_colors.indexOf(color) > -1 && active_sidebar_dark_color === null) {
            active_sidebar_dark_color = color
        }
    })

    $sidebar_dark_variants.find('option.' + active_sidebar_dark_color).prop('selected', true)
    $sidebar_dark_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_sidebar_dark_color)

    $container.append('<h6>Light Sidebar Variants</h6>')
    var $sidebar_variants_light = $('<div />', {
        class: 'd-flex'
    })
    $container.append($sidebar_variants_light)
    var $sidebar_light_variants = createSkinBlock(sidebar_colors, function () {
        var color = $(this).find('option:selected').attr('class')
        var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        sidebar_skins.forEach(function (skin) {
            $sidebar.removeClass(skin)
            $sidebar_dark_variants.removeClass(skin.replace('sidebar-light-', 'bg-')).removeClass('text-light')
        })

        $(this).removeClass().addClass('custom-select mb-3 text-light border-0').addClass(color)

        $sidebar_dark_variants.find('option').prop('selected', false)
        $sidebar.addClass(sidebar_class)
        $('.sidebar').removeClass('os-theme-light').addClass('os-theme-dark')
    }, true)
    $container.append($sidebar_light_variants)

    var active_sidebar_light_color = null
    $('.main-sidebar')[0].classList.forEach(function (className) {
        var color = className.replace('sidebar-light-', 'bg-')
        if (sidebar_colors.indexOf(color) > -1 && active_sidebar_light_color === null) {
            active_sidebar_light_color = color
        }
    })

    if (active_sidebar_light_color !== null) {
        $sidebar_light_variants.find('option.' + active_sidebar_light_color).prop('selected', true)
        $sidebar_light_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_sidebar_light_color)
    }

    var logo_skins = navbar_all_colors
    $container.append('<h6>Brand Logo Variants</h6>')
    var $logo_variants = $('<div />', {
        class: 'd-flex'
    })
    $container.append($logo_variants)
    var $clear_btn = $('<a />', {
        href: '#'
    }).text('clear').on('click', function (e) {
        e.preventDefault()
        var $logo = $('.brand-link')
        logo_skins.forEach(function (skin) {
            $logo.removeClass(skin)
        })
    })

    var $brand_variants = createSkinBlock(logo_skins, function () {
        var color = $(this).find('option:selected').attr('class').replace('bg-', 'navbar-')
        var $logo = $('.brand-link')

        if (color === 'navbar-light' || color === 'navbar-white') {
            $logo.addClass('text-black')
        } else {
            $logo.removeClass('text-black')
        }

        logo_skins.forEach(function (skin) {
            $logo.removeClass(skin)
        })

        if (color) {
            $(this).removeClass().addClass('custom-select mb-3 border-0').addClass(color).addClass(color !== 'navbar-light' && color !== 'navbar-white' ? 'text-light' : '')
        } else {
            $(this).removeClass().addClass('custom-select mb-3 border-0')
        }

        $logo.addClass(color)
    }, true).append($clear_btn)
    $container.append($brand_variants)

    var active_brand_color = null
    $('.brand-link')[0].classList.forEach(function (className) {
        if (logo_skins.indexOf(className) > -1 && active_brand_color === null) {
            active_brand_color = className.replace('navbar-', 'bg-')
        }
    })

    if (active_brand_color) {
        $brand_variants.find('option.' + active_brand_color).prop('selected', true)
        $brand_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_brand_color)
    }
})(jQuery)

function getBulan(bulan) {
    var bln = '';
    switch (bulan) {
        case "01":
            bln = 'Januari';
            break;
        case "02":
            bln = 'Februari';
            break;
        case "03":
            bln = 'Maret';
            break;
        case "04":
            bln = 'April';
            break;
        case "05":
            bln = 'Mei';
            break;
        case "06":
            bln = 'Juni';
            break;
        case "07":
            bln = 'Juli';
            break;
        case "08":
            bln = 'Agustus';
            break;
        case "09":
            bln = 'September';
            break;
        case "10":
            bln = 'Oktober';
            break;
        case "11":
            bln = 'November';
            break;
        case "12":
            bln = 'Desember';
            break;
    }
    return bln;
}
