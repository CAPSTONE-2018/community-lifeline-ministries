</main>



<!--<script src="../../js/plugins/popper.js/popper.min.js"></script>-->
<script src="../../js/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="../../js/main.js"></script>

<script src="../../js/plugins/mdl-inputs/input-styling.min.js"></script>
<script src="../../js/plugins/mdl-select/MdlSelect.js"></script>
<script src="../../js/suppressEnter.js"></script>
<script src="../../js/forms/CapitalizeFirstLetter.js"></script>
<script src="../../js/NumberTableRows.js"></script>
<script src="../../js/forms/FilterFields.js"></script>
<script src="../../js/forms/ToggleSwitchValues.js"></script>
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
<script src="../../js/modals/ModalFooterRoutes.js"></script>
<script src="../../js/modals/program/ValidateProgramEntry.js"></script>
<script src="../../js/modals/contact/EditContactConfirmation.js"></script>

<!-- The javascript plugin to display page loading on top-->
<!--<script src="js/plugins/pace.min.js"></script>-->
<!-- Page specific javascripts-->
<!--<script type="text/javascript" src="js/plugins/chart.js"></script>-->
<script type="text/javascript">
    var data = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }
        ]
    };
    var pdata = [
        {
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        },
        {
            value: 50,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }
    ]

    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
</script>
</body>
</html>