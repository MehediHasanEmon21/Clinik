$(document).ready(function() {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#invite_submit").click(function () {
    var first_name = $("input[name=first_name]").val();
    var last_name = $("input[name=last_name]").val();
    var email = $("input[name=email]").val();
    var role_id = $("select[name=admin_role]").val();

    console.log(`Invited this member: ${email}`);

    $.ajax({
        type: 'POST',
        url: "/api/admin/invite",
        data: {
            first_name,
            last_name,
            email,
            role_id
        },
        success: function (data) {
            alert('An Invitation has been sent to this E-mail address.');
            $('#invite_admin').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
            });
            $('#invite_admin').modal('hide');
        }
    });
});
});
