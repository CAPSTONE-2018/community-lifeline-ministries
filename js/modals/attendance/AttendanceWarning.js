function launchAttendanceWarningModal() {

    $('#customModal').removeClass().addClass('modal fade generic-modal');
    $('#customSize').removeClass().addClass('modal-dialog');
    $('#customTitle').removeClass().addClass('modal-header warning-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-exclamation-circle fa-2x');
    $('#customHeaderText').text("Hold On!");
    $('.modal-body').addClass('text-center');
    $('.modal-body').text("Not All Students Have Been Selected.");
    $('#customModal').modal('show');

    setTimeout(function() {
        $('#customModal').modal('hide');
    }, 3000);

}

function launchAttendanceStudentToContactsModal(studentId) {

    $.ajax({
        url: '../modals/students/AttendanceFileStudentToContact.php',
        type: 'post',
        data: {studentId: studentId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal right fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header contact-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-address-card-o fa-2x');
            $('#customHeaderText').text("Contact Info");
            $('.modal-body').html(response);
            $('#customModal').modal('show');
        }
    });
}