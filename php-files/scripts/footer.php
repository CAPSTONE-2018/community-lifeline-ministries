<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

<script src="../../js/forms/CapitalizeFirstLetter.js"></script>
<script src="../../js/NumberTableRows.js"></script>
<script src="../../js/forms/FilterFields.js"></script>
<script src="../../js/modals/show-tables/ShowStudentsModalScripts.js"></script>
<script src="../../js/modals/show-tables/ShowContactModalScripts.js"></script>
<script src="../../js/modals/show-tables/ShowProgramsModalScripts.js"></script>
<script src="../../js/modals/show-tables/ToggleStudentTable.js"></script>
<script src="../../js/modals/new-student/AddStudentConfirmation.js"></script>
<script src="../../js/forms/ToggleSwitchValues.js"></script>
<script src="../../js/input-styling.min.js"></script>
<script src="../../js/modals/new-student/ConfirmStudentEntries.js"></script>
<script src="../../js/forms/MdlSelect.js"></script>
<script src="../../js/modals/ModalFooterRoutes.js"></script>
<script src="../../js/modals/ValidateMessageModal.js"></script>
<script src="../../scripts/print.js"></script>

</div>
</div>

</body>
</html>