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

function launchArchiveContactModal(contactId, contactName) {
    var modalBodyMessage =
        '<div class="text-center">' +
        'Are you sure you want to archive the Contact, <br/>' + contactName + '?' +
        '</div>';

    var yesButton = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#customModal" data-dismiss="modal" onclick="archiveContact('+contactId+')">Yes, Im Sure</button>';
    var noButton = '<button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#customModal" data-dismiss="modal">No, Go Back</button>';

    $('#customModal').removeClass().addClass('modal fade');
    $('#customSize').removeClass().addClass('modal-dialog');
    $('#customTitle').removeClass().addClass('modal-header warning-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-archive fa-2x');
    $('#customHeaderText').text("Archive Contact");
    $('#customModal').find('#customFooterActions').append(yesButton, noButton);
    $('.modal-body').html(modalBodyMessage);
    $('#customModal').modal('show');
}

function archiveContact(contactId) {
    $.ajax({
        url: "../mysql-statements/archive/ArchiveContact.php",
        method: "POST",
        data: {contactId: contactId},
        success: function (output) {
            if (output === "success") {
                launchGenericSuccessfulArchive();
                window.location.href = "../show/ShowContacts.php"
            } else {
                launchGenericDatabaseErrorModal();
            }
        }
    });
}
