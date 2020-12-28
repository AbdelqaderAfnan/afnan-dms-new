jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add-document').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm-document').trigger("reset");
        jQuery('#formModal-document').modal('show');
    });
    jQuery('#btn-hide').click(function(){
        jQuery('#formModal-document').modal('hide');
    });

    
});