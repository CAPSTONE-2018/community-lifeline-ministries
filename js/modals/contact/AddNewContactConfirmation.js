function launchAddNewContactConfirmationModal(serializedForm) {
    $.ajax({
        url: "../../php-files/add/AddContact.php",
        method: "POST",
        data: serializedForm,
        success: function(output) {
            var parsedOutput = JSON.parse(output);
            var contactConfirmation = parsedOutput['contact-confirmation'];

            var homePageButton = document.createElement("BUTTON");
            var homePageButtonTitle = document.createTextNode("Back to Home Page");
            homePageButton.appendChild(homePageButtonTitle);
            homePageButton.onclick = function () {
                location.href = "../../../php-files/index-login/menu.php";
            };

            var newStudentButton = document.createElement("BUTTON");
            var newStudentButtonTitle = document.createTextNode("Add New Contact");
            newStudentButton.appendChild(newStudentButtonTitle);
            newStudentButton.onclick = function () {
                location.href = "../../../php-files/new/NewContact.php";
            };

            var footerRow = '<div id="footerButtons" class="text-center">' +
                '<button onclick="routeToHomePage()">Back to Home Page</button>' +
                '<button onclick="routeToNewContact()">Add New Contact</button>' +
                '</div>';

            $.ajax({
                url: '../../php-files/modals/contacts/VerifyNewContact.php',
                method: "POST",
                data: {
                    contact: contactConfirmation
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
                        window.location.href = '../../php-files/new/NewContact.php';
                    });
                }
            });
        }
    })
}