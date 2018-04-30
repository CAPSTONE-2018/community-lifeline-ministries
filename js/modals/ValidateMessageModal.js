function launchDuplicateEntryModal(duplicateEntryTitleToPassThrough, submissionType) {
    $.ajax({
        url: '../modals/DuplicateEntryModal.php',
        type: 'post',
        data: {
            duplicateEntryTitle: duplicateEntryTitleToPassThrough,
            submissionType: submissionType
        },
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header duplicate-entry-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-ban fa-2x');
            $('#dynamic-title').text("Warning Duplicate Entry");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}

function launchSuccessfulEntryModal(successfulEntryTitle, submissionType,
                                    viewAllRoute, viewAllButtonTitle,
                                    newEntryRoute, newEntryButtonTitle) {
    $.ajax({
        url: '../modals/AddNewStudentConfirmation.php',
        type: 'post',
        data: {
            successfulEntryTitle: successfulEntryTitle,
            submissionType: submissionType,
            viewAllRoute: viewAllRoute,
            viewAllButtonTitle: viewAllButtonTitle,
            newEntryRoute: newEntryRoute,
            newEntryButtonTitle: newEntryButtonTitle
        },
        success: function (response) {
            $('#custom-modal').removeClass().addClass('modal fade');
            $('#custom-size').removeClass().addClass('modal-dialog');
            $('#custom-title').removeClass().addClass('modal-header successful-entry-modal-header');
            $('#custom-icon').removeClass().addClass('m-auto fa fa-check fa-2x');
            $('#dynamic-title').text("Success! Entry Added");
            $('.modal-body').html(response);
            $('#custom-modal').modal('show');
        }
    });
}