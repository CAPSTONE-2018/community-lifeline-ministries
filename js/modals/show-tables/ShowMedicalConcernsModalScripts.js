function launchEditMedicalConcernsModal(medicalConcernId) {

    $.ajax({
       url: '../modals/medical-concerns/EditModal.php',
       type: 'POST',
       data: {medicalConcernId: medicalConcernId},
       success: function (response) {

           $('#customModal').removeClass().addClass('modal fade');
           $('#customSize').removeClass().addClass('modal-dialog modal-lg');
           $('#customTitle').removeClass().addClass('modal-header edit-modal-header');
           $('#customIcon').removeClass().addClass('m-auto fa fa-pencil ');
           $('#customModal').find('#customHeaderText').text("Edit Medical Concern Info");
           $('#titleWrapper').find('h4').addClass("large-font");
           $('#customModalBody').html(response);
           $('#customModal').modal("show");
           componentHandler.upgradeDom();
       }
    });
}