function launchEditMedicalConcernsModal(medicalConcernId) {
    $.ajax({
       url: '../modals/medical-concerns/EditModal.php',
       type: 'POST',
       data: {medicalConcernId: medicalConcernId},
       success: function (response) {
           $('#custom-modal').removeClass().addClass('modal fade');
           $('#custom-size').removeClass().addClass('modal-dialog modal-lg');
           $('#custom-title').removeClass().addClass('modal-header edit-modal-header');
           $('#custom-icon').removeClass().addClass('m-auto fa fa-pencil ');
           $('#dynamic-title').text("Edit Medical Concern Info");
           $('#title-wrapper').find('h4').addClass("large-font");
           $('.modal-body').html(response);
           componentHandler.upgradeDom();
           $('#custom-modal').modal("show");
       }
    });
}