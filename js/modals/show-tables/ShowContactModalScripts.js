function launchEditContactModal(contactId) {
    $.ajax({
        url: '../modals/contacts/EditModal.php',
        type: 'POST',
        data: {contactId: contactId},
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
            $('#custom-title').removeClass().addClass('modal-header edit-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#dynamic-title').text("Edit Contact Info");
            $('#title-wrapper').find('h4').addClass("large-font");
            $('.modal-body').html(response);
            $('#custom-modal').modal("show");
            getmdlSelect.init(".getmdl-select");
            componentHandler.upgradeDom();
        }
    });
}

function launchStudentsToContactModal(contactId) {
    $.ajax({
        url: '../modals/contacts/',
        type: 'POST',
        data: {
            contactId: contactId
        },
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal right fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header contact-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-graduation-cap fa-2x');
            $('#dynamic-title').text("Students For This Contact");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    })
}