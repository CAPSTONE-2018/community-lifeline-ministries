function launchContactConfirmationModal(serializedForm) {
    $('#customModal').modal('hide');
    $.ajax({
        url: '/community-lifeline-ministries/php-files/mysql-statements/update/UpdateContact.php',
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

            $('#customModal').removeClass().addClass('modal fade');
            $('#customSize').removeClass().addClass('modal-dialog');
            $('#customTitle').removeClass().addClass('modal-header successful-entry-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-check fa-2x');
            $('#customModal').find('#customHeaderText').text("Edit Contact Confirmation");
            $('#customModalBody').html(successText);
            $('#customModal').modal('show');
            $('#customModal').on('hidden.bs.modal', function (e) {
                window.location.href = '../../php-files/show/ShowContacts.php';
            });

        }
    });

}