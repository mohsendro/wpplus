function sampleFunctionAjaxJs() {

    let element = document.getElementById('name').value;

    jQuery.ajax({
        url: sample_ajax_localize_obj.ajax_url,
        type: 'post',
        dataType: 'json',
        data: {
            action: 'sample_ajax_handle',
            submitted_nonce: sample_ajax_localize_obj.the_nonce,
            element: element,
        },
        success: function (response) {
            alert(response.data.success);
            console.log(response);
        },
        error: function (response) {
            alert('Error retrieving the information: ' + response.status + ' ' + response.statusText);
            console.log(response);
        }
    });

}