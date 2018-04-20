function toggleActiveStudents() {

}

function toggleSonsOfThunder() {
    $.ajax({
        url: "./student-tables/SonsOfThunder.php",
        success: function (output) {
            $('#studentsTableTitle').text("Sons of Thunder");
            $('#allStudentsTableWrapper').slideToggle();
            $('#allStudentsTableWrapper').slideDown().html(output);

        }
    })
}

function toggleGem() {
    $.ajax({
        url: "./student-tables/Gem.php",
        success: function (output) {
            $('#studentsTableTitle').text("G.E.M.");
            $('#allStudentsTableWrapper').slideToggle();
            $('#allStudentsTableWrapper').slideDown().html(output);
        }
    })
}

function toggleBlessingTable() {
    $.ajax({
        url: "./student-tables/BlessingTable.php",
        success: function (output) {
            $('#studentsTableTitle').text("Blessing Table");
            $('#allStudentsTableWrapper').slideToggle();
            $('#allStudentsTableWrapper').slideDown().html(output);
        }
    })
}

function toggleInactiveStudents() {
    $.ajax({
        url: "./student-tables/InactiveStudents.php",
        success: function (output) {
            $('#studentsTableTitle').text("Inactive Students");
            $('#allStudentsTableWrapper').slideToggle();
            $('#allStudentsTableWrapper').slideDown().html(output);
        }
    })
}