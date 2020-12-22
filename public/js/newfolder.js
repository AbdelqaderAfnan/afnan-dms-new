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
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            folder_name: jQuery('#folder_name').val(),
            branch_name: jQuery('#branch_name').val(),
            cerate_by:   jQuery('#cerate_by').val(),
            _token:   jQuery('#_token').val(),
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
                if(state == 'add')
                {
                    console.log('success');
                    console.log(data);
                    var folder = '<tr id="folder' + data.id + '"><td>' 
                    + data.folder_name + '</td><td>' 
                    + data.cerate_by + '</td><td>' 
                    + data.created_at + '</td></tr>';
                    
                    
                    jQuery('#folder_list').append(folder);
                    //jQuery("#folder" + todo_id).replaceWith(todo);
                    jQuery('#myForm').trigger("reset");
                    jQuery('#formModal').modal('hide')
                    location.reload(true);
                    }
                
                
            },
            error: function (data) {
                
                console.log('fail');
                console.log(data);
            }
        });
    });
});