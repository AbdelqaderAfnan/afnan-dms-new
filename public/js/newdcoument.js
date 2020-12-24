jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add-document').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal-document').modal('show');
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
            folder_name:    jQuery('#folder_name').val(),
            branch_name:    jQuery('#branch_name').val(),
            user_id:        jQuery('#user_id').val(),
            perent_folder : jQuery('#perent_folder').val(),
            _token:         jQuery('#_token').val(),
           
        };
        
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var ajaxurl = '/folder';

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) 
            {
                
                if(state == 'add')
                {
                    console.log('success');
                    console.log(data);
                    var folder = '<tr id="folder' + data.id + '"><td>' 
                    + data.folder_name + '</td><td>' 
                    + data.user_id + '</td><td>' 
                    + data.created_at + '</td></tr>';
                    
                    
                    jQuery('#folder_list').append(folder);
                    jQuery("#folder" + data.id).replaceWith(folder);
                    jQuery('#myForm').trigger("reset");
                    jQuery('#formModal').modal('hide')
                    location.reload(true);
                }  
            },
            error: function (data) 
            {
                console.log('fail');
                console.log(data);
            }
        });
    });
});