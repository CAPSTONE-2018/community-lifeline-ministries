function launchConfirmArchiveModal(idToArchive, urlRouteToArchive, typeToDisplay, nameToDisplay, newLocationToRoute) {
    var modalBodyMessage =
        '<div class="text-center">' +
        'Are you sure you want to archive the ' + typeToDisplay + ' <br/>' + nameToDisplay + '?' +
        '</div>';

    var yesButton = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#customModal" data-dismiss="modal" onclick="archiveEvent(\'' + idToArchive + '\',\'' + urlRouteToArchive + '\',\'' + newLocationToRoute + '\')">Yes, Im Sure</button>';
    var noButton = '<button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#customModal" data-dismiss="modal">No, Go Back</button>';

    $('#customModal').removeClass().addClass('modal fade');
    $('#customSize').removeClass().addClass('modal-dialog');
    $('#customTitle').removeClass().addClass('modal-header warning-modal-header');
    $('#customIcon').removeClass().addClass('m-auto fa fa-archive fa-2x');
    $('#customModal').find('#customHeaderText').text("Archive " + typeToDisplay);
    $('#customModal').find('#customFooterActions').append(yesButton, noButton);
    $('#customModalBody').html(modalBodyMessage);
    $('#customModal').modal('show');
}

function archiveEvent(idToArchive, urlRouteToArchive, newLocationToRoute) {
    $.ajax({
        url: '/community-lifeline-ministries/php-files/mysql-statements/archive/' + urlRouteToArchive + '',
        type: 'POST',
        data: {
            idToArchive: idToArchive
        },
        success: function (response) {
            if (response === "success") {
                launchGenericSuccessfulArchive();
                setTimeout(function() {
                    $('#customModal').modal('hide');
                    sendToNewLocation(newLocationToRoute);
                }, 3000);


            } else {
                launchGenericDatabaseErrorModal();
            }
        }
    });
}

function sendToNewLocation(newLocationToRoute) {
    window.location.href = '../show/' + newLocationToRoute + ''
}