function launchConfirmVolunteerEntriesModal(serializedForm) {
    $.ajax({
        url: '../modals/employees/VerifyNewEmployee.php',
        type: 'POST',
        data: serializedForm,
        success: function(response) {
            $('#placeHolderForVerifyNewEmployeeInfo').html(response);
            $('#showVolunteerEmployeeModal').modal({show: true});
        }
    })
}
