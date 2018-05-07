function launchEditContactModal(contactId) {
    $.ajax({
        url: '../modals/contacts/EditModal.php',
        type: 'POST',
        data: {contactId: contactId},
        success: function (response) {
            $('#customModal').removeClass().addClass('modal fade');
            $('#customSize').removeClass().addClass('modal-dialog modal-lg');
            $('#customTitle').removeClass().addClass('modal-header edit-modal-header');
            $('#customIcon').removeClass().addClass('m-auto fa fa-pencil ');
            $('#customModal').find('#customHeaderText').text("Edit Contact Info");
            $('#titleWrapper').find('h4').addClass("large-font");
            $('#customModalBody').html(response);
            $('#customModal').modal("show");
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
            $('#customModalBody').html(response);
            $('#customModal').modal('show');
        }
    })
}