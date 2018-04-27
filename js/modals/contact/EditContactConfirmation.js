function launchContactConfirmationModal(serializedForm) {
    $('#custom-modal').modal('hide');
    $.ajax({
        url: '../update/UpdateContact.php',
        method: "POST",
        data: serializedForm,
        success: function (response) {
            var parsedOutput = JSON.parse(response);
            var contactConfirmation = parsedOutput['contact-confirmation'];

            var successText = '';
            if(contactConfirmation === true) {
                successText = 'Contact Was Edited Successfully.'
            } else {
                successText = 'Whoops! There Was A Problem Submitting Your Request.'
            }

            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header successful-entry-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-check fa-2x');
            $('#dynamic-title').text("Edit Contact Confirmation");
            $('.modal-body').html(successText);
            $('#custom-modal').modal('show');
            $('#custom-modal').on('hidden.bs.modal', function (e) {
                window.location.href = '../../php-files/show/ShowContacts.php';
            });

        }
    });

}