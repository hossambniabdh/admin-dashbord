$(document).ready(function () {
    $('#table_id').DataTable();
});
$(document).on('click', '#updatecom', function () {
    //$(".purchase").click(function(){
    //	alert("test");
    var name = $(this).attr("data-name");
    var email = $(this).attr("data-email");
    var logo = $(this).attr("data-logo");
    var website = $(this).attr("data-website");
    var id = $(this).attr("data-id");

    $('#data-name').val(name);
    $('#data-email').val(email);

    $('#data-website').val(website);
    $('#data-id').val(id);
    console.log($('#name'));

});
$('#savecom').click(function () {
    var id = $('#data-id').val();
    var name = $('#data-name').val();
    var email = $('#data-email').val();
    var website = $('#data-website').val();

    $.ajax({
        url: 'updatecom',
        method: 'get',
        data: {
            id: id,
            name: name,
            email: email,
            website: website,

        },
        success: function (response, data) {

            window.location.reload();
        }
    })

});

$(document).on('click', '#deletecom', function () {

    var id = $(this).attr("data-id");

    $.ajax({
        url: 'deletecom',
        method: 'get',
        data: {
            id: id,

        },
        success: function (response, data) {

            window.location.reload();
        }
    })


});