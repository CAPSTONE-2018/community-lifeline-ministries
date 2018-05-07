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

            $('#customModal').on('hidden.bs.modal', function (e) {
                $('#customModal').removeClass();
                $('#customSize').removeClass();
                $('#customIcon').removeClass();
                $('#customModalBody').text();
            });
        }
    });
}
