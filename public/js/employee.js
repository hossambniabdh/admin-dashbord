
$(document).on('click', '#update', function () {
    //$(".purchase").click(function(){
    //	alert("test");
    var data_fname = $(this).attr("data-fname");
    var data_lname = $(this).attr("data-lname");
    var data_email = $(this).attr("data-email");
    var data_phone = $(this).attr("data-phone");
    var data_id = $(this).attr("data-id");

    $('#data-fname').val(data_fname);
    $('#data-lname').val(data_lname);
    $('#data-email').val(data_email);
    $('#data-phone').val(data_phone);
    $('#data-id').val(data_id);
    console.log($('#data-fname'));

});

$('#save').click(function () {
    var id = $('#data-id').val();
    var fname = $('#data-fname').val();
    var lname = $('#data-lname').val();
    var email = $('#data-email').val();
    var phone = $('#data-phone').val();
    parseInt(id);
    $.ajax({
        url: 'update',
        method: 'get',
        data: {
            id: id,
            fname: fname,
            lname: lname,
            email: email,
            phone: phone
        },
        success: function (response, data) {

            window.location.reload();
        }
    })

});

$(document).on('click', '#delete', function () {

    var id = $(this).attr("data-id");

    $.ajax({
        url: 'delete',
        method: 'get',
        data: {
            id: id,

        },
        success: function (response, data) {

            window.location.reload();
        }
    })


});

