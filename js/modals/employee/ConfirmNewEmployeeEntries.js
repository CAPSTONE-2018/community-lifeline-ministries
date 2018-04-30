function launchConfirmVolunteerEntriesModal(serializedForm) {
    $.ajax({
        url: '../../php-files/modals/employees/ConfirmEmployeeEntries.php',
        type: 'POST',
        data: serializedForm,
        success: function(output) {


            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
            $('#custom-title').removeClass().addClass('modal-header confirm-student-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-check fa-2x');
            $('#dynamic-title').text("Confirm Contact Info");
            $('.modal-body').html(output);
            componentHandler.upgradeDom();
            $('#custom-modal').modal('show');
        }
    })
}
