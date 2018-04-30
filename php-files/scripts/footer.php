<!-- Bootstrap Js CDN -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->




<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('closed');
            document.cookie = "menuCollapse=True";
            $('#content').toggleClass('col-sm-11');
        });
    });

    //    needed for all tooltips
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
    });


</script>

<script src="../../js/suppressEnter.js"></script>
<script src="../../js/forms/CapitalizeFirstLetter.js"></script>
<script src="../../js/NumberTableRows.js"></script>
<script src="../../js/forms/FilterFields.js"></script>

<!--Show All Table Scripts-->
<script src="../../js/modals/show-tables/ShowStudentsModalScripts.js"></script>
<script src="../../js/modals/show-tables/ShowContactModalScripts.js"></script>
<script src="../../js/modals/show-tables/ShowProgramsModalScripts.js"></script>
<script src="../../js/modals/show-tables/ShowVolunteerEmployees.js"></script>
<script src="../../js/modals/show-tables/ToggleStudentTable.js"></script>
<script src="../../js/modals/show-tables/ShowMedicalConcernsModalScripts.js"></script>

<!--Student Related Scripts-->
<script src="../../js/modals/student/AddNewStudentConfirmation.js"></script>
<script src="../../js/modals/student/EditStudentConfirmation.js"></script>
<script src="../../js/modals/student/ConfirmNewStudentEntries.js"></script>

<!--Contact Related Scripts-->
<script src="../../js/modals/contact/ConfirmNewContactEntries.js"></script>
<script src="../../js/modals/contact/AddNewContactConfirmation.js"></script>

<!--Employee Related Scripts-->
<script src="../../js/modals/employee/ConfirmNewEmployeeEntries.js"></script>
<script src="../../js/forms/ToggleSwitchValues.js"></script>
<script src="../../js/plugins/mdl-inputs/input-styling.min.js"></script>
<script src="../../js/plugins/mdl-select/MdlSelect.js"></script>
<script src="../../js/modals/ModalFooterRoutes.js"></script>
<script src="../../js/modals/program/ValidateProgramEntry.js"></script>
<script src="../../js/modals/contact/EditContactConfirmation.js"></script>

<!--<script src="../../scripts/print.js"></script>-->

</div>
</div>

</body>
</html>
