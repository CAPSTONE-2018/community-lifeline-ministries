function launchArchiveUserModal(studentIdToArchive, tableToLookUp, nameToDisplay) {
    $.ajax({
        url: '../modals/ArchiveUserModal.php',
        type: 'POST',
        data: {
            studentIdToArchive: studentIdToArchive,
            tableToLookUp: tableToLookUp,
            nameToDisplay: nameToDisplay
        },
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header warning-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
            $('#dynamic-title').text("Archive User");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}