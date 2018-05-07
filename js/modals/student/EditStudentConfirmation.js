// function launchEditStudentConfirmationModal(serializedForm) {
//     $('#custom-modal').modal('hide');
//     $.ajax({
//         url: '../update/UpdateStudent.php',
//         method: "POST",
//         data: serializedForm,
//         success: function (response) {
//             var parsedOutput = JSON.parse(response);
//             var studentConfirmation = parsedOutput['student-confirmation'];
//
//             var successText = '';
//             if(studentConfirmation === true) {
//                 successText = 'Student Was Edited Successfully.'
//             } else {
//                 successText = 'Whoops! There Was A Problem Submitting Your Request.'
//             }
//
//             $('#custom-modal').removeClass().addClass('modal fade');
//             $('#custom-size').removeClass().addClass('modal-dialog');
//             $('#custom-title').removeClass().addClass('modal-header successful-entry-modal-header');
//             $('#custom-icon').removeClass().addClass('m-auto fa fa-check fa-2x');
//             $('#dynamic-title').text("Edit Student Confirmation");
//             $('.modal-body').addClass('text-center');
//             $('.modal-body').html(successText);
//             $('#custom-modal').modal('show');
//             $('#custom-modal').on('hidden.bs.modal', function (e) {
//                 $('.modal-body').removeClass('text-center');
//                 window.location.href = '../../php-files/show/ShowStudents.php';
//             });
//
//         }
//     });
//
// }