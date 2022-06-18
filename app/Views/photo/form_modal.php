<?= form_open('photo/save', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>

<div class="modal-body">
    <?php foreach ($form_input as $form) :
        echo $form;
    endforeach;
    ?>
</div>
<div class="modal-footer">
    <input type='hidden' name='action' value='<?= $action; ?>' />
    <button type='submit' class='btn btn-primary pull-right'><?= $btn; ?></a></button>
</div>
<?php echo form_close(); ?>

<script type='text/javascript'>
    $('form').on('blur', 'input[required], input.optional, select.required', validator.checkField).on('change', 'select.required', validator.checkField).on('keypress', 'input[required][pattern]', validator.keypress);
    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });
    $('form').submit(function(e) {
        e.preventDefault();
        if (!validator.checkAll($(this))) {
            return false;
        } else {

            let formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                enctype: 'multypart/form-data',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    var data = $.parseJSON(response);
                    if (data.type == "success") {
                        Lobibox.notify(data.type, {
                            position: 'top right',
                            msg: data.text
                        })
                    } else {
                        $.each(data.text, function(i, val) {
                            Lobibox.notify(data.type, {
                                position: 'top right',
                                msg: i + ' : ' + val
                            })
                        })
                    }
                    $('#modal_content').modal('hide');
                    $('#table').bootstrapTable('refresh');
                },
                error: function(jqXHR, exception, thrownError) {
                    Lobibox.notify('error', {
                        position: 'top right',
                        msg: 'Error code' + jqXHR.status + ', ' + thrownError + ', ' + exception
                    });
                    $('#spinner').hide();
                }
            });
        }
    });
</script>