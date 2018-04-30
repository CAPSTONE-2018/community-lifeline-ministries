function launchAddNewStudentConfirmationModal(serializedForm, serializedStudentMedicalForm, serializedStudentContactForm) {
    $.ajax({
        url: "../../php-files/add/AddStudent.php",
        method: "POST",
        data: serializedForm,
        success: function(output) {
            $.ajax({
                url: '../../php-files/add/AddStudentToMedicalConcerns.php',
                type: 'POST',
                data: serializedStudentMedicalForm,
                success: function(output) {


                    $.ajax({
                        url: '../../php-files/add/AddContact.php',
                        type: 'POST',
                        data: serializedStudentContactForm,

                        success: function(output) {
                            var parsedOutput = JSON.parse(output);
                            // var studentConfirmation = parsedOutput['student-confirmation'];
                            // var programConfirmation = parsedOutput['program-confirmation'];
                            // var newContactConfirmation = parsedOutput['new-contact-confirmation'];
                            // var studentToContactConfirmation = parsedOutput['student-to-contact'];

                            var homePageButton = document.createElement("BUTTON");
                            var homePageButtonTitle = document.createTextNode("Back to Home Page");
                            homePageButton.appendChild(homePageButtonTitle);
                            homePageButton.onclick = function () {
                                location.href = "../../../php-files/index-login/menu.php";
                            };

                            var newStudentButton = document.createElement("BUTTON");
                            var newStudentButtonTitle = document.createTextNode("Add New Student");
                            newStudentButton.appendChild(newStudentButtonTitle);
                            newStudentButton.onclick = function () {
                                location.href = "../../../php-files/new/NewStudent.php";
                            };

                            var footerRow = '<div id="footerButtons" class="text-center">' +
                                '<button onclick="routeToHomePage()">Back to Home Page</button>' +
                                '<button onclick="routeToNewStudent()">Add New Student</button>' +
                                '</div>';

                            $.ajax({
                                url: '../../php-files/modals/students/AddNewStudentConfirmation.php',
                                method: "POST",
                                data: {
                                    // student: studentConfirmation,
                                    // program: programConfirmation,
                                    // contact: newContactConfirmation,
                                    // studentContact: studentToContactConfirmation
                                },
                                success: function (response) {
                                    $('#custom-modal').removeClass().addClass('modal fade');
                                    $('#custom-size').removeClass().addClass('modal-dialog');
                                    $('#custom-title').removeClass().addClass('modal-header successful-entry-modal-header');
                                    $('#custom-icon').removeClass().addClass('m-auto fa fa-archive fa-2x');
                                    $('#dynamic-title').text("Add User Confirmation");
                                    $('.modal-body').html(response);
                                    $('.modal-footer').html(footerRow);
                                    $('#custom-modal').modal('show');
                                    $('#custom-modal').on('hidden.bs.modal', function (e) {
                                        window.location.href = '../../php-files/new/NewStudent.php';
                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    })
}