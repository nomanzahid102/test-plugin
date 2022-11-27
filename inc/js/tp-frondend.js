jQuery(document).ready(function ($) {
    $('#visited-user').submit((e) => {
        e.preventDefault();
        $(".submit-form").attr("disabled", true);
        $('.submit-button').addClass('togle-class');

        var Formdata = $('#visited-user').serialize();
        // console.log("Data",Formdata);

        $.ajax({
            type: 'POST',
            url: tp_js_object.admin_ajax_url,
            data: {
                data: Formdata,
                dataType: "json",
                action: 'tp_post_ajax_action',
                _wpnonce: tp_js_object.admin_ajax_nonce
            },

            success: (res) => {
                $(".submit-form").attr("disabled", false);
                $('.submit-button').removeClass('togle-class');
                $response = $.parseJSON(res);
                $('.message').text($response.message).show();
                // console.log($response);
            }


        })
    });
});