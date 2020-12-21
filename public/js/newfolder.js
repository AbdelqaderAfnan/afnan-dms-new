jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });
    jQuery('#btn-back').click(function(){
        jQuery('#formModal').modal('hide');
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            folder_name: jQuery('#folder_name').val()
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var ajaxurl = '/folder';

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data)
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});